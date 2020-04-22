<?php

namespace Scraper\ScraperAvisVerifies\Api;

use Scraper\Scraper\Api\AbstractApi;
use Scraper\ScraperAvisVerifies\Entity\Review;
use Scraper\ScraperAvisVerifies\Entity\Website;
use Symfony\Component\DomCrawler\Crawler;

final class AvisVerifiesAvisClientsApi extends AbstractApi
{
    public function execute(): Website
    {
        $content = $this->response->getContent();

        $crawler = new Crawler($content);
        $website = new Website();

        $this->getInfo($crawler, $website);
        $this->getReviews($crawler, $website);

        return $website;
    }

    public function getInfo(Crawler $crawler, Website $website): void
    {
        $node    = $crawler->filter('div[itemtype="http://schema.org/LocalBusiness"]');
        $address = $node->filter('div[itemtype="http://schema.org/PostalAddress"]');

        $i = -1;

        if (9 == $node->filter('.row')->count()) {
            $i                    = 0;
            $website->description = $node->filter('.row')->eq($i)->filter('.value')->text(null, true);
        }

        $website->image      = $node->filter('meta[itemprop="image"]')->attr('content');
        $website->address    = $address->filter('span[itemprop="streetAddress"]')->text(null, true);
        $website->postalCode = $address->filter('span[itemprop="postalCode"]')->text(null, true);
        $website->city       = $address->filter('span[itemprop="addressLocality"]')->text(null, true);
        $website->website    = $node->filter('.row')->eq($i + 3)->filter('.value a')->attr('href');
        $website->contact    = $node->filter('.row')->eq($i + 4)->filter('.value')->text(null, true);
        $website->agent      = $node->filter('.row')->eq($i + 5)->filter('.value')->text(null, true);
        $website->status     = $node->filter('.row')->eq($i + 6)->filter('.value')->text(null, true);
        $website->nbReview   = (int) $crawler->filter('span[itemprop="reviewCount"]')->text(null, true);
        $website->note       = (int) $crawler->filter('span[itemprop="ratingValue"]')->text(null, true);
        $website->bestRating = (int) $crawler->filter('span[itemprop="bestrating"]')->text(null, true);
    }

    public function getReviews(Crawler $crawler, Website $website): void
    {
        $crawler->filter('.review.row')->each(function (Crawler $node, $i) use ($website) {
            $review = new Review();
            $review->id = $node->attr('id');
            $review->rating = (int) $node->filter('.rating span')->text(null, true);
            $review->review = $node->filter('.text')->text(null, true);

            if (
                null !== $node->filter('.details meta')->attr('content') &&
                $date = \DateTime::createFromFormat('d/m/Y', $node->filter('.details meta')->attr('content'))
            ) {
                $review->datePublished= $date;
            }

            $review->dateCreated= $node->filter('.details meta')->last()->attr('content');
            $review->author= $node->filter('span[itemtype="http://schema.org/Person"] span[itemprop="name"]')->text(null, true);

            if ($node->filter('span[itemtype="http://schema.org/Organization"] span[itemprop="name"]')->count() > 0) {
                $review->organization=$node->filter('span[itemtype="http://schema.org/Organization"] span[itemprop="name"]')->html();
            }

            $website->addReview($review);
        });
    }
}
