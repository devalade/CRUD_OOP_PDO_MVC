<?php

class Musee {
    private $numMus;
    private $nomMus;
    private $nblivres;
    private $codePays;
    

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
     * Get the value of nomMus
     */ 
    public function getNomMus()
    {
        return $this->nomMus;
    }

    /**
     * Set the value of nomMus
     *
     * @return  self
     */ 
    public function setNomMus($nomMus)
    {
        $this->nomMus = $nomMus;

        return $this;
    }

    /**
     * Get the value of nblivres
     */ 
    public function getNblivres()
    {
        return $this->nblivres;
    }

    /**
     * Set the value of nblivres
     *
     * @return  self
     */ 
    public function setNblivres($nblivres)
    {
        $this->nblivres = $nblivres;

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