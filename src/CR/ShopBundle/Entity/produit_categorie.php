<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * produit_categorie
 *
 * @ORM\Table(name="produit_categorie")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\produit_categorieRepository")
 */
class produit_categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="produit_id", type="integer")
     */
    private $produitId;

    /**
     * @var int
     *
     * @ORM\Column(name="categorie_id", type="integer")
     */
    private $categorieId;

    /**
     * @var int
     *
     * @ORM\Column(name="sous_categorie_id", type="integer")
     */
    private $sousCategorieId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set produitId
     *
     * @param integer $produitId
     *
     * @return produit_categorie
     */
    public function setProduitId($produitId)
    {
        $this->produitId = $produitId;

        return $this;
    }

    /**
     * Get produitId
     *
     * @return int
     */
    public function getProduitId()
    {
        return $this->produitId;
    }

    /**
     * Set categorieId
     *
     * @param integer $categorieId
     *
     * @return produit_categorie
     */
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get categorieId
     *
     * @return int
     */
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set sousCategorieId
     *
     * @param integer $sousCategorieId
     *
     * @return produit_categorie
     */
    public function setSousCategorieId($sousCategorieId)
    {
        $this->sousCategorieId = $sousCategorieId;

        return $this;
    }

    /**
     * Get SousCategorieId
     *
     * @return int
     */
    public function getSousCategorieId()
    {
        return $this->sousCategorieId;
    }
}

