<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Library;

use GuzzleHttp\Client as GuzzleClient;

abstract class Client
{
    private GuzzleClient $client;

    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    abstract protected function uri(): string;

    public function client(): GuzzleClient
    {
        return $this->client;
    }

    public function get(string $url): array
    {
        try {
            $response = $this->client()->request('GET', $url);
        } catch (\Exception $e) {
            throw new \Exception('La API de wikipedia no response');
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
