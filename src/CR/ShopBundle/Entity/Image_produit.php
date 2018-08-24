<?php

namespace CR\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image_produit
 *
 * @ORM\Table(name="image_produit")
 * @ORM\Entity(repositoryClass="CR\ShopBundle\Repository\Image_produitRepository")
 */
class Image_produit
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
     * @ORM\Column(name="image_id", type="integer")
     */
    private $imageId;

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
     * Set imageId
     *
     * @param integer $imageId
     *
     * @return Image_produit
     */
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return int
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set produitId
     *
     * @param integer $produitId
     *
     * @return Image_produit
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

