<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\CommentairesRepository")
 */
class Commentaires
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
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;


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
     * @return Commentaires
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
     * @return Commentaires
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
     * @return Commentaires
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Commentaires
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}

