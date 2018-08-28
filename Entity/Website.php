<?php

namespace Scraper\ScraperAvisVerifies\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Website
{
	/**
	 * @var string
	 */
	protected $address;
	/**
	 * @var string
	 */
	protected $postalCode;
	/**
	 * @var string
	 */
	protected $city;
	/**
	 * @var string
	 */
	protected $description;
	/**
	 * @var string
	 */
	protected $website;
	/**
	 * @var string
	 */
	protected $image;
	/**
	 * @var string
	 */
	protected $contact;
	/**
	 * @var string
	 */
	protected $agent;
	/**
	 * @var string
	 */
	protected $status;
	/**
	 * @var int
	 */
	protected $nbReview;
	/**
	 * @var int
	 */
	protected $note;
	/**
	 * @var int
	 */
	protected $bestRating;
	/**
	 * @var ArrayCollection|Review
	 */
	protected $reviews;

	/**
	 * Website constructor.
	 */
	public function __construct()
	{
		$this->reviews = new ArrayCollection();
	}

	public function addReview(Review $review){
		$this->reviews->add($review);
	}

	/**
	 * @return string
	 */
	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * @param string $address
	 *
	 * @return $this
	 */
	public function setAddress(?string $address)
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAgent(): ?string
	{
		return $this->agent;
	}

	/**
	 * @param string $agent
	 *
	 * @return $this
	 */
	public function setAgent(?string $agent)
	{
		$this->agent = $agent;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getBestRating(): ?int
	{
		return $this->bestRating;
	}

	/**
	 * @param int $bestRating
	 *
	 * @return $this
	 */
	public function setBestRating(?int $bestRating)
	{
		$this->bestRating = $bestRating;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCity(): ?string
	{
		return $this->city;
	}

	/**
	 * @param string $city
	 *
	 * @return $this
	 */
	public function setCity(?string $city)
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContact(): ?string
	{
		return $this->contact;
	}

	/**
	 * @param string $contact
	 *
	 * @return $this
	 */
	public function setContact(?string $contact)
	{
		$this->contact = $contact;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 *
	 * @return $this
	 */
	public function setDescription(?string $description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): ?string
	{
		return $this->image;
	}

	/**
	 * @param string $image
	 *
	 * @return $this
	 */
	public function setImage(?string $image)
	{
		$this->image = $image;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNbReview(): ?int
	{
		return $this->nbReview;
	}

	/**
	 * @param int $nbReview
	 *
	 * @return $this
	 */
	public function setNbReview(?int $nbReview)
	{
		$this->nbReview = $nbReview;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getNote(): ?int
	{
		return $this->note;
	}

	/**
	 * @param int $note
	 *
	 * @return $this
	 */
	public function setNote(?int $note)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPostalCode(): ?string
	{
		return $this->postalCode;
	}

	/**
	 * @param string $postalCode
	 *
	 * @return $this
	 */
	public function setPostalCode(?string $postalCode)
	{
		$this->postalCode = $postalCode;
		return $this;
	}

	/**
	 * @return ArrayCollection|Review
	 */
	public function getReviews()
	{
		return $this->reviews;
	}

	/**
	 * @param ArrayCollection|Review $reviews
	 *
	 * @return $this
	 */
	public function setReviews($reviews)
	{
		$this->reviews = $reviews;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getStatus(): ?string
	{
		return $this->status;
	}

	/**
	 * @param string $status
	 *
	 * @return $this
	 */
	public function setStatus(?string $status)
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getWebsite(): ?string
	{
		return $this->website;
	}

	/**
	 * @param string $website
	 *
	 * @return $this
	 */
	public function setWebsite(?string $website)
	{
		$this->website = $website;
		return $this;
	}
}
