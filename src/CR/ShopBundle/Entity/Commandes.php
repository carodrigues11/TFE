<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commandes
 *
 * @ORM\Table(name="commandes")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\CommandesRepository")
 */
class Commandes
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="boutique_id", type="integer")
     */
    private $boutiqueId;

    /**
     * @var int
     *
     * @ORM\Column(name="num_commande", type="integer")
     */
    private $numCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="frais_port", type="integer")
     */
    private $fraisPort;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_total", type="integer")
     */
    private $prixTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="mode_paiement", type="string", length=255)
     */
    private $modePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Commandes
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set boutiqueId
     *
     * @param integer $boutiqueId
     *
     * @return Commandes
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
     * Set numCommande
     *
     * @param integer $numCommande
     *
     * @return Commandes
     */
    public function setNumCommande($numCommande)
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    /**
     * Get numCommande
     *
     * @return int
     */
    public function getNumCommande()
    {
        return $this->numCommande;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commandes
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set fraisPort
     *
     * @param integer $fraisPort
     *
     * @return Commandes
     */
    public function setFraisPort($fraisPort)
    {
        $this->fraisPort = $fraisPort;

        return $this;
    }

    /**
     * Get fraisPort
     *
     * @return int
     */
    public function getFraisPort()
    {
        return $this->fraisPort;
    }

    /**
     * Set prixTotal
     *
     * @param integer $prixTotal
     *
     * @return Commandes
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return int
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return Commandes
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Commandes
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

