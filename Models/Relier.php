<?php

class Relier {
    private $nomSite1;
    private $nomSite2;
    private $distance;
    

    /**
     * Get the value of nomSite1
     */ 
    public function getNomSite1()
    {
        return $this->nomSite1;
    }

    /**
     * Set the value of nomSite1
     *
     * @return  self
     */ 
    public function setNomSite1($nomSite1)
    {
        $this->nomSite1 = $nomSite1;

        return $this;
    }

    /**
     * Get the value of nomSite2
     */ 
    public function getNomSite2()
    {
        return $this->nomSite2;
    }

    /**
     * Set the value of nomSite2
     *
     * @return  self
     */ 
    public function setNomSite2($nomSite2)
    {
        $this->nomSite2 = $nomSite2;

        return $this;
    }

    /**
     * Get the value of distance
     */ 
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set the value of distance
     *
     * @return  self
     */ 
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }
}