<?php

class Referencer {
    private $nomSite;
    private $numeroPage;
    private $ISBN;
    

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
     * Get the value of numeroPage
     */ 
    public function getNumeroPage()
    {
        return $this->numeroPage;
    }

    /**
     * Set the value of numeroPage
     *
     * @return  self
     */ 
    public function setNumeroPage($numeroPage)
    {
        $this->numeroPage = $numeroPage;

        return $this;
    }

    /**
     * Get the value of ISBN
     */ 
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     *
     * @return  self
     */ 
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }
}