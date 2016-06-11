<?php

namespace NatocTo\FootballData\Model;

use NatocTo\FootballData\Content;

class Team extends BaseModel {

    private $payload;

    public function __construct(Content $content, $payload)
    {
        parent::__construct($content);

        $this->payload = $payload;
    }


    /**
     * Return team id.
     *
     * @return int
     */
    public function id()
    {
        return $this->payload->id;
    }


    /**
     * Return team name.
     *
     * @return string
     */
    public function name()
    {
        return $this->payload->name;
    }


    /**
     * Return object contains all available information about current team.
     *
     * @return stdObjects
     */
    public function detail()
    {
        return $this->payload;
    }


    /**
     * Function returns all fixtures for the team for this season.
     *
     * @param string $venue
     * @param string $timeFrame
     * @return array of stdObjects representing fixtures
     */
    public function getFixtures($venue = "", $timeFrame = "") {

        $uri = $this->payload->_links->fixtures->href . '/?venue=' . $venue . '&timeFrame=' . $timeFrame;

        return $this->content->fetch($uri);
    }


    /**
     * Function returns all players of the team
     *
     * @return array of fixture objects
     */
    public function getPlayers() {

        $uri = $this->payload->_links->players->href;

        $response = $this->content->fetch($uri);

        return $response->players;
    }
}
