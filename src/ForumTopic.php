<?php
/**
 * Created by PhpStorm.
 * User: tarab
 * Date: 04/03/2020
 * Time: 20:34
 */

class ForumTopic
{
private $id;
private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toArray(){

        return[$this->name];
    }

}