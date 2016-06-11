<?php

namespace NatocTo\FootballData\Model;

use NatocTo\FootballData\Content;

class Soccerseason extends BaseModel {

    private $payload;

    public function __construct(Content $content, $payload)
    {
        parent::__construct($content);

        $this->payload = $payload;
    }


    /**
     * Function returns all fixtures for the instantiated soccerseason.
     *
     * @return array of fixture objects
     */
    public function getFixtures() {

        $uri = $this->payload->_links->fixtures->href;

        return $this->content->fetch($uri);
    }


    /**
     * Function returns all fixtures for a given matchday.
     *
     * @param type $matchday
     * @return array of fixture objects
     */
    public function getFixturesByMatchday($matchday = 1) {

        $uri = $this->payload->_links->fixtures->href . '/?matchday=' . $matchday;

        $response = $this->content->fetch($uri);

        return $response->fixtures;
    }


    /**
     * Function returns all teams participating in the instantiated soccerseason.
     *
     * @return array of team objects
     */
    public function getTeams() {

        $uri = $this->payload->_links->teams->href;

        $response = $this->content->fetch($uri);

        return $response->teams;
    }


    /**
     * Function returns the current league table for the instantiated soccerseason.
     *
     * @return object leagueTable
     */
    public function getTable() {

        $uri = $this->payload->_links->leagueTable->href;

        return $this->content->fetch($uri);
    }
}