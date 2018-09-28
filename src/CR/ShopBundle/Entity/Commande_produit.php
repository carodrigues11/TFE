<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande_produit
 *
 * @ORM\Table(name="commande_produit")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\Commande_produitRepository")
 */
class Commande_produit
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
     * @ORM\Column(name="commande_id", type="integer")
     */
    private $commandeId;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * @return Commande_produit
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
     * Set commandeId
     *
     * @param integer $commandeId
     *
     * @return Commande_produit
     */
    public function setCommandeId($commandeId)
    {
        $this->commandeId = $commandeId;

        return $this;
    }

    /**
     * Get commandeId
     *
     * @return int
     */
    public function getCommandeId()
    {
        return $this->commandeId;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Commande_produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

