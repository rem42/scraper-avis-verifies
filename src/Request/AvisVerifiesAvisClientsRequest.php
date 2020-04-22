<?php

namespace Scraper\ScraperAvisVerifies\Request;

use Scraper\Scraper\Annotation\Scraper;

/**
 * @Scraper(path="/avis-clients/{website}")
 */
final class AvisVerifiesAvisClientsRequest extends AvisVerifiesRequest
{
    protected string $website;

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }
}
