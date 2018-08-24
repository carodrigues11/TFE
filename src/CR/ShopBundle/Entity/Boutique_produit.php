<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique_produit
 *
 * @ORM\Table(name="boutique_produit")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\Boutique_produitRepository")
 */
class Boutique_produit
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
     * @ORM\Column(name="boutique_id", type="integer")
     */
    private $boutiqueId;

    /**
     * @var int
     *
     * @ORM\Column(name="produit_id", type="integer")
     */
    private $produitId;


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
     * Set boutiqueId
     *
     * @param integer $boutiqueId
     *
     * @return Boutique_produit
     */
    public function setBoutiqueId($boutiqueId)
    {
        $this->boutiqueId = $boutiqueId;

        return $this;
    }

    /**
     * Get boutiqueId
     *
     * @return int
     */
    public function getBoutiqueId()
    {
        return $this->boutiqueId;
    }

    /**
     * Set produitId
     *
     * @param integer $produitId
     *
     * @return Boutique_produit
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
}

