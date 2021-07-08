<?php

 class Pays {
     private $codePays;
     private $nbhabitant;
     

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

     /**
      * Get the value of nbhabitant
      */ 
     public function getNbhabitant()
     {
          return $this->nbhabitant;
     }

     /**
      * Set the value of nbhabitant
      *
      * @return  self
      */ 
     public function setNbhabitant($nbhabitant)
     {
          $this->nbhabitant = $nbhabitant;

          return $this;
     }
 }