<?php

class Site {
    private $nomSite;
    private $anneedecouv;
    private $codePays;
    

    /**
     * Get the value of nomSite
     */ 
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Set the value of nomSite
     *
     * @return  self
     */ 
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * Get the value of anneedecouv
     */ 
    public function getAnneedecouv()
    {
        return $this->anneedecouv;
    }

    /**
     * Set the value of anneedecouv
     *
     * @return  self
     */ 
    public function setAnneedecouv($anneedecouv)
    {
        $this->anneedecouv = $anneedecouv;

        return $this;
    }

    /**
     * Get the value of codePays
     */ 
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set the value of codePays
     *
     * @return  self
     */ 
    public function setCodePays($codePays)
    {
        $this->codePays = $codePays;

        return $this;
    }
}