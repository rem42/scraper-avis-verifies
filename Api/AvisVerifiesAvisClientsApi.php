<?php

namespace Scraper\ScraperAvisVerifies\Api;

use Scraper\ScraperAvisVerifies\Entity\Review;
use Scraper\ScraperAvisVerifies\Entity\Website;
use Scraper\ScraperAvisVerifies\Request\AvisVerifiesAvisClientsRequest;
use Symfony\Component\DomCrawler\Crawler;

class AvisVerifiesAvisClientsApi extends AvisVerifiesApi
{
	/**
	 * @var AvisVerifiesAvisClientsRequest
	 */
	protected $request;
	/**
	 * @var Website
	 */
	protected $object;

	public function execute()
	{
		$this->object = new Website();
		/** @var Crawler $crawler */
		$crawler = $this->data;

		$this->getInfo($crawler);
		$this->getReviews($crawler);

		return $this->object;
	}

	public function getInfo(Crawler $crawler)
	{
		$node    = $crawler->filter('div[itemtype="http://schema.org/LocalBusiness"]');
		$address = $node->filter('div[itemtype="http://schema.org/PostalAddress"]');

		$i = -1;
		if ($node->filter('.row')->count() == 8) {
			$i = 0;
			$this->object
				->setDescription(trim($node->filter('.row')->eq($i)->filter('.value')->text()));
		}

		$this->object
			->setImage($node->filter('meta[itemprop="image"]')->attr("content"))
			->setAddress(trim($address->filter('span[itemprop="streetAddress"]')->text()))
			->setPostalCode($address->filter('span[itemprop="postalCode"]')->text())
			->setCity($address->filter('span[itemprop="addressLocality"]')->text())
			->setWebsite($node->filter('.row')->eq($i + 3)->filter('.value a')->attr('href'))
			->setContact(trim($node->filter('.row')->eq($i + 4)->filter('.value')->text()))
			->setAgent(trim($node->filter('.row')->eq($i + 5)->filter('.value')->text()))
			->setStatus(trim($node->filter('.row')->eq($i + 6)->filter('.value')->text()))
			->setNbReview(trim($node->filter('.row')->eq($i + 7)->filter('.value')->text()))
			->setNote(trim($crawler->filter('span[itemprop="ratingValue"]')->text()))
			->setBestRating(trim($crawler->filter('span[itemprop="bestrating"]')->text()))
		;
	}

	public function getReviews(Crawler $crawler)
	{
		$crawler->filter('.review.row')->each(function (Crawler $node, $i) {
			$review = new Review();
			$review
				->setId($node->attr("id"))
				->setRating($node->filter(".rating span")->html())
				->setReview(trim($node->filter(".text")->text()))
				->setDatePublished(\DateTime::createFromFormat('d/m/Y', $node->filter(".details meta")->attr("content")))
				->setDateCreated($node->filter(".details meta")->last()->attr("content"))
				->setAuthor($node->filter('span[itemtype="http://schema.org/Person"] span[itemprop="name"]')->html())
			;

			if ($node->filter('span[itemtype="http://schema.org/Organization"] span[itemprop="name"]')->count() > 0) {
				$review
					->setOrganization($node->filter('span[itemtype="http://schema.org/Organization"] span[itemprop="name"]')->html());
			}

			$this->object->addReview($review);
		})
		;
	}
}
