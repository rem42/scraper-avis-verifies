<?php

namespace Scraper\ScraperAvisVerifies\Entity;

final class Website
{
    public string $address;
    public string $postalCode;
    public string $city;
    public string $description;
    public ?string $website;
    public ?string $image;
    public string $contact;
    public string $agent;
    public string $status;
    public int $nbReview;
    public int $note;
    public int $bestRating;
    /** @var array<Review> */
    public array $reviews = [];

    public function addReview(Review $review): self
    {
        $this->reviews[] = $review;

        return $this;
    }
}
