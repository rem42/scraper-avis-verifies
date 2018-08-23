<?php

namespace Scraper\ScraperAvisVerifies\Entity;

class Review
{
	/**
	 * @var string
	 */
	protected $id;
	/**
	 * @var int
	 */
	protected $rating;
	/**
	 * @var string
	 */
	protected $review;
	/**
	 * @var string
	 */
	protected $author;
	/**
	 * @var string
	 */
	protected $organization;
	/**
	 * @var \DateTime
	 */
	protected $datePublished;
	/**
	 * @var string
	 */
	protected $dateCreated;

	/**
	 * @return string
	 */
	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return $this
	 */
	public function setId(?string $id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRating(): ?int
	{
		return $this->rating;
	}

	/**
	 * @param int $rating
	 *
	 * @return $this
	 */
	public function setRating(?int $rating)
	{
		$this->rating = $rating;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getReview(): ?string
	{
		return $this->review;
	}

	/**
	 * @param string $review
	 *
	 * @return $this
	 */
	public function setReview(?string $review)
	{
		$this->review = $review;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAuthor(): ?string
	{
		return $this->author;
	}

	/**
	 * @param string $author
	 *
	 * @return $this
	 */
	public function setAuthor(?string $author)
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrganization(): ?string
	{
		return $this->organization;
	}

	/**
	 * @param string $organization
	 *
	 * @return $this
	 */
	public function setOrganization(?string $organization)
	{
		$this->organization = $organization;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDatePublished(): ?\DateTime
	{
		return $this->datePublished;
	}

	/**
	 * @param \DateTime $datePublished
	 *
	 * @return $this
	 */
	public function setDatePublished(?\DateTime $datePublished)
	{
		$this->datePublished = $datePublished;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDateCreated(): ?string
	{
		return $this->dateCreated;
	}

	/**
	 * @param string $dateCreated
	 *
	 * @return $this
	 */
	public function setDateCreated(?string $dateCreated)
	{
		$this->dateCreated = $dateCreated;
		return $this;
	}
}
