<?php
/**
 * Created by PhpStorm.
 * User: tarab
 * Date: 05/03/2020
 * Time: 06:54
 */

class ForumComment
{
private $id;
private $topicId;
private $userName;
private $content;
private $dateAndTime;

    public function getDateAndTime()
    {
        return $this->dateAndTime;
    }

    public function setDateAndTime($dateAndTime)
    {
        $this->dateAndTime = $dateAndTime;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTopicId()
    {
        return $this->topicId;
    }

    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function __toArray(){

        return [
            $this->topicId,
            $this->userName,
            $this->content,
            $this->dateAndTime
        ];
    }
}