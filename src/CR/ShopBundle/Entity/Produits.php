<?php

namespace CR\ShopBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\ProduitsRepository")
 */
class Produits
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
     * @ORM\Column(name="boutiqueId", type="integer")
     */
    private $boutiqueId;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="promo", type="integer", nullable=true)
     */
    private $promo;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_grossiste", type="integer", nullable=true)
     */
    private $prixGrossiste;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $dateCreation;


    function __construct()
    {
        $this->date(new \DateTime());
    }


    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="bio", type="integer", nullable=true)
     */
    private $bio;

    /**
     * @var int
     *
     * @ORM\Column(name="gluten", type="integer", nullable=true)
     */
    private $gluten;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="image_id", type="integer", length=11)
     */
    private $imageId;

    /**
     * @var string
     *
     * @ORM\Column(name="categories", type="integer", length=11)
     */
    private $categories;


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
     * @return Produits
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Produits
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set promo
     *
     * @param integer $promo
     *
     * @return Produits
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return int
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set prixGrossiste
     *
     * @param integer $prixGrossiste
     *
     * @return Produits
     */
    public function setPrixGrossiste($prixGrossiste)
    {
        $this->prixGrossiste = $prixGrossiste;

        return $this;
    }

    /**
     * Get prixGrossiste
     *
     * @return int
     */
    public function getPrixGrossiste()
    {
        return $this->prixGrossiste;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Produits
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produits
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
     * Set bio
     *
     * @param integer $bio
     *
     * @return Produits
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return int
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set gluten
     *
     * @param integer $gluten
     *
     * @return Produits
     */
    public function setGluten($gluten)
    {
        $this->gluten = $gluten;

        return $this;
    }

    /**
     * Get gluten
     *
     * @return int
     */
    public function getGluten()
    {
        return $this->gluten;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produits
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imageId
     *
     * @param string $imageId
     *
     * @return Produits
     */
    public function setImageId($imageId)
    {
        $this->image = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set categories
     *
     * @param string $categories
     *
     * @return Produits
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }
}

