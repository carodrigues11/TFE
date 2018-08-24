<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CR\ShopBundle\Entity\Produits;
use CR\ShopBundle\Form\ProduitsType;


class ProduitsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $produit = $em->getRepository("CRShopBundle:Produits")->findAll();



        return $this->render('CRShopBundle:Default:produits.html.twig', array(
            'produits'=>$produit
        ));
    }



}
