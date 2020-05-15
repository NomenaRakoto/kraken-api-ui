<?php

namespace App;

class Kraken
{
    private $id;
    private $name;
    private $age;
    private $size;
    private $weight;
    private $tentacles = [];
    private $powers = [];

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    private function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function isAllowedToAddTentacle()
    {
        return count($this->tentacles) < config("kraken.nb_max_tentacle");
    }

    public function isAllowedToAddPower()
    {
        $nbTentacles = count($this->tentacles);
        $nbPowers = count($this->powers);
        $nbPowerAllowed = (floor($nbTentacles / config("kraken.nb_tentacle_power")));
        return $nbPowerAllowed > $nbPowers;
       
    }

    public function getId()
    {
        return $this->id;
    }

    public function get($name)
    {
        return $this->$name;
    }

    public function getTentacles()
    {
        return $this->tentacles;
    }

    public function getPowers()
    {
        return $this->powers;
    }
}
