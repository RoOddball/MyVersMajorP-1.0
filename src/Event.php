<?php

class Event
{

    private $id;
    private $eventName;
    private $venue;
    private $fighterRed;
    private $fighterBlue;
    private $eventDate;
    private $result;
    private $way;

    public function getId()
    {
        return $this->id;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    public function getVenue()
    {
        return $this->venue;
    }

    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    public function getFighterRed()
    {
        return $this->fighterRed;
    }

    public function setFighterRed($fighterRed)
    {
        $this->fighterRed = $fighterRed;
    }

    public function getFighterBlue()
    {
        return $this->fighterBlue;
    }

    public function setFighterBlue($fighterBlue)
    {
        $this->fighterBlue = $fighterBlue;
    }

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getWay()
    {
        return $this->way;
    }

    public function setWay($way)
    {
        $this->way = $way;
    }

    public function __toArray(){

        return[
            $this->eventName,
            $this->venue,
            $this->fighterRed,
            $this->fighterBlue,
            $this->eventDate,
            $this->result,
            $this->way
        ];
    }
}