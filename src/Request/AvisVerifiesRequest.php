<?php

namespace Scraper\ScraperAvisVerifies\Request;

use Scraper\Scraper\Annotation\Scraper;
use Scraper\Scraper\Request\ScraperRequest;

/**
 * @Scraper(host="www.avis-verifies.com", scheme="HTTPS", method="GET", contentType="HTML")
 */
abstract class AvisVerifiesRequest extends ScraperRequest
{
}
