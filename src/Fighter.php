<?php


class Fighter
{
    private $id;
    private $fighterName;
    private $weight;
    private $height;
    private $p4vRank;
    private $nationality;
    private $win;
    private $loss;
    private $draw;
    private $dateOfBirth;

    public function getId()
    {
        return $this->id;
    }

    public function getFighterName()
    {
        return $this->fighterName;
    }


    public function setFighterName($fighterName)
    {
        $this->fighterName = $fighterName;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getP4vRank()
    {
        return $this->p4vRank;
    }

    public function setP4vRank($p4vRank)
    {
        $this->p4vRank = $p4vRank;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    public function getWin()
    {
        return $this->win;
    }

    public function setWin($win)
    {
        $this->win = $win;
    }

    public function getLoss()
    {
        return $this->loss;
    }

    public function setLoss($loss)
    {
        $this->loss = $loss;
    }

    public function getDraw()
    {
        return $this->draw;
    }

    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function __toArray(){

        return [
            $this->fighterName,
            $this->weight,
            $this->height,
            $this->p4vRank,
            $this->nationality,
            $this->win,
            $this->loss,
            $this->draw,
            $this->dateOfBirth
            ];
    }
}