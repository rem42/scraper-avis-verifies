<?php

namespace Scraper\ScraperAvisVerifies\Request;

use Scraper\Scraper\Annotation\UrlAnnotation;

/**
 * Class AvisVerifiesAvisClientsRequest
 * @package Scraper\ScraperAvisVerifies\Request
 *
 * @UrlAnnotation(url="avis-clients/{website}", method="GET", contentType="HTML", protocol="CURL")
 */
class AvisVerifiesAvisClientsRequest extends AvisVerifiesRequest
{
	/**
	 * @var string
	 */
	protected $website;

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
