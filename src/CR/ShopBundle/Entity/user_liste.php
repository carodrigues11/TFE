<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * user_liste
 *
 * @ORM\Table(name="user_liste")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\user_listeRepository")
 */
class user_liste
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
     * @ORM\Column(name="liste_id", type="integer")
     */
    private $listeId;


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
     * @return user_liste
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
     * Set listeId
     *
     * @param integer $listeId
     *
     * @return user_liste
     */
    public function setListeId($listeId)
    {
        $this->listeId = $listeId;

        return $this;
    }

    /**
     * Get listeId
     *
     * @return int
     */
    public function getListeId()
    {
        return $this->listeId;
    }
}

