<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liste_recurrente
 *
 * @ORM\Table(name="liste_recurrente")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\Liste_recurrenteRepository")
 */
class Liste_recurrente
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
     * @ORM\Column(name="boutique_produit_id", type="integer")
     */
    private $boutiqueProduitId;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


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
     * @return Liste_recurrente
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
     * Set boutiqueProduitId
     *
     * @param integer $boutiqueProduitId
     *
     * @return Liste_recurrente
     */
    public function setBoutiqueProduitId($boutiqueProduitId)
    {
        $this->boutiqueProduitId = $boutiqueProduitId;

        return $this;
    }

    /**
     * Get boutiqueProduitId
     *
     * @return int
     */
    public function getBoutiqueProduitId()
    {
        return $this->boutiqueProduitId;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Liste_recurrente
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

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Liste_recurrente
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}

