<?php

namespace NatocTo\FootballData;

use NatocTo\FootballData\Model;

class FootballData {

    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }


    /**
     * Function returns a specific soccer season identified by an id.
     *
     * @param  int $id
     * @return NatocTo\FootballData\Model\SoccerSeason
     */
    public function getSeason($id) {

        $resource = 'soccerseasons/' . $id;

        $response = $this->content->fetch($resource);

        return new Model\Soccerseason($this->content, $response);
    }


    /**
     * Function returns one unique team identified by a given id.
     *
     * @param  int $id
     * @return NatocTo\FootballData\Model\Team
     */
    public function getTeam($id) {

        $resource = 'teams/' . $id;

        $response = $this->content->fetch($resource);

        return new Model\Team($this->content, $response);
    }


    /**
     * Function returns a specific soccer seasons identified by an year.
     *
     * @param  int $id
     * @return NatocTo\FootballData\Model\SoccerSeason
     */
    public function getSeasonsByYear($year) {

        $resource = 'soccerseasons/?season=' . $year;

        return $this->content->fetch($resource);
    }


    /**
     * Function returns all available fixtures for a given date range.
     *
     * @param  DateString 'Y-m-d' $start
     * @param  DateString 'Y-m-d' $end
     * @return array - list of fixtures
     */
    public function getFixtures($start, $end) {

        $resource = 'fixtures/?timeFrameStart=' . $start . '&timeFrameEnd=' . $end;

        return $this->content->fetch($resource);
    }


    /**
     * Function returns one unique fixture identified by a given id.
     *
     * @param  int $id
     * @return stdObject
     */
    public function getFixture($id) {

        $resource = 'fixtures/' . $id;

        return $this->content->fetch($resource);
    }


    /**
     * Function returns all teams matching a given keyword.
     *
     * @param  string $keyword
     * @return array - list of teams
     */
    public function searchTeam($keyword) {

        $resource = 'teams/?name=' . urlencode($keyword);

        return $this->content->fetch($resource);
    }
}
