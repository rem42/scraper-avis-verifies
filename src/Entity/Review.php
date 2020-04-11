<?php

namespace Scraper\ScraperAvisVerifies\Entity;

class Review
{
    public ?string $id;
    public int $rating;
    public string $review;
    public string $author;
    public string $organization;
    public ?\DateTime $datePublished;
    public ?string $dateCreated;
}
