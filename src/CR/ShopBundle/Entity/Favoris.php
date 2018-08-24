<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\FavorisRepository")
 */
class Favoris
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
     * @ORM\Column(name="boutique_produit_id", type="integer")
     */
    private $boutiqueProduitId;


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
     * @return Favoris
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
     * @return Favoris
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
     * Set boutiqueProduitId
     *
     * @param integer $boutiqueProduitId
     *
     * @return Favoris
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
}

