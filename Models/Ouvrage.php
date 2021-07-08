<?php 
class Ouvrage {
    private $ISBN;
    private $nbPage;
    private $titre;
    private $codePays;

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
     * Get the value of nbPage
     */ 
    public function getNbPage()
    {
        return $this->nbPage;
    }

    /**
     * Set the value of nbPage
     *
     * @return  self
     */ 
    public function setNbPage($nbPage)
    {
        $this->nbPage = $nbPage;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

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