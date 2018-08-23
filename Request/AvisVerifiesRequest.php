<?php

namespace Scraper\ScraperAvisVerifies\Request;

use Scraper\Scraper\Annotation\UrlAnnotation;
use Scraper\Scraper\Request\Request;

/**
 * Class AvisVerifiesRequest
 * @package Scraper\ScraperTrustpilot\Request
 *
 * @UrlAnnotation(baseUrl="https://www.avis-verifies.com/")
 */
abstract class AvisVerifiesRequest extends Request
{

	public function getBody()
	{
		return [];
	}

	public function getHeaders()
	{
		return [];
	}

	public function getParameters()
	{
		return [];
	}
}
