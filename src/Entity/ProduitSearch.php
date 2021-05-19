<?php
namespace App\Entity;

class ProduitSearch {
     /**
     * @var int|null
     */
    private $maxPrix;
         /**
     * @var string|null
     */
    private $nomProduit;





    /**
     * Get the value of nomProduit
     *
     * @return  string|null
     */ 
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set the value of nomProduit
     *
     * @param  string|null  $nomProduit
     *
     * @return  self
     */ 
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get the value of maxPrix
     *
     * @return  int|null
     */ 
    public function getMaxPrix()
    {
        return $this->maxPrix;
    }

    /**
     * Set the value of maxPrix
     *
     * @param  int|null  $maxPrix
     *
     * @return  self
     */ 
    public function setMaxPrix($maxPrix)
    {
        $this->maxPrix = $maxPrix;

        return $this;
    }
}