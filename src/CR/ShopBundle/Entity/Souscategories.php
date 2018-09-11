<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscategories
 *
 * @ORM\Table(name="souscategories")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\SouscategoriesRepository")
 */
class Souscategories
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="categorie_id", type="integer")
     */
    private $categorieId;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Souscategories
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

    /**
     * Set categorieId
     *
     * @param integer $categorieId
     *
     * @return Souscategories
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
}

