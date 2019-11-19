<?php

class FightCard
{
private $id;
private $eventName;
private $fighterBlue;
private $fighterRed;
private $realatedEvent;

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

    public function getFighterBlue()
    {
        return $this->fighterBlue;
    }

    public function setFighterBlue($fighterBlue)
    {
        $this->fighterBlue = $fighterBlue;
    }

    public function getFighterRed()
    {
        return $this->fighterRed;
    }

    public function setFighterRed($fighterRed)
    {
        $this->fighterRed = $fighterRed;
    }

    public function getRealatedEvent()
    {
        return $this->realatedEvent;
    }

    public function setRealatedEvent($realatedEvent)
    {
        $this->realatedEvent = $realatedEvent;
    }

    public function __toArray(){

        return[
            $this->eventName,
            $this->fighterRed,
            $this->fighterBlue,
            $this->realatedEvent
        ];
    }
}