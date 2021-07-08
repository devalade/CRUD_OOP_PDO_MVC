<?php
class Visiter {
    private $numMus;
    private $jour;
    private $nbvisiteur;

    /**
     * Get the value of numMus
     */ 
    public function getNumMus()
    {
        return $this->numMus;
    }

    /**
     * Set the value of numMus
     *
     * @return  self
     */ 
    public function setNumMus($numMus)
    {
        $this->numMus = $numMus;

        return $this;
    }

    /**
     * Get the value of jour
     */ 
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     *
     * @return  self
     */ 
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get the value of nbvisiteur
     */ 
    public function getNbvisiteur()
    {
        return $this->nbvisiteur;
    }

    /**
     * Set the value of nbvisiteur
     *
     * @return  self
     */ 
    public function setNbvisiteur($nbvisiteur)
    {
        $this->nbvisiteur = $nbvisiteur;

        return $this;
    }
}