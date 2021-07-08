<?php

class Bibliotheque {
    private $numMus;
    private $ISBN;
    private $dateAchat;



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

    /**
     * Get the value of dateAchat
     */ 
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * Set the value of dateAchat
     *
     * @return  self
     */ 
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }
}

?>