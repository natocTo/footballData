<?php

namespace NatocTo\FootballData;

use GuzzleHttp\Client;

class Content {

    private $authToken;

    private $client;

    public function __construct($authToken) {

        $this->authToken = $authToken;

        $this->client = new Client(['base_uri' => 'http://api.football-data.org/v1/',]);
    }


    public function fetch($resource)
    {
        $response = $this->client->get($resource, ['headers' => ['X-Auth-Token' => $this->authToken]]);

        return json_decode($response->getBody());
    }
}