<?php

namespace Scraper\ScraperAvisVerifies\Tests\Request;

use PHPUnit\Framework\TestCase;
use Scraper\Scraper\Client;
use Scraper\ScraperAvisVerifies\Entity\Website;
use Scraper\ScraperAvisVerifies\Request\AvisVerifiesAvisClientsRequest;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class AvisVerifiesAvisClientsRequestTest extends TestCase
{
    public function testAvisVerifiesAvisClientsRequest(): void
    {
        $responseInterface = $this->createMock(ResponseInterface::class);
        $responseInterface
            ->method('getStatusCode')->willReturn(200);
        $responseInterface
            ->method('getContent')->willReturn(file_get_contents('../Fixtures/darty.com.html'))
        ;
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient
            ->method('request')->willReturn($responseInterface)
        ;
        $client = new Client($httpClient);

        $request = new AvisVerifiesAvisClientsRequest();
        $request->setWebsite('darty.com');

        /** @var Website $result */
        $result = $client->send($request);

        $this->assertInstanceOf(Website::class, $result);

        $this->assertEquals('94768', $result->postalCode);
    }
}
