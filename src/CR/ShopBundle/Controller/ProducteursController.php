<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class ProducteursController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $boutique = $em->getRepository("CRShopBundle:Boutique")->findAll();



        return $this->render('CRShopBundle:Default:producteurs.html.twig', array(
            'boutiques'=>$boutique
        ));




    }



    public function viewAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $boutique = $em->getRepository("CRShopBundle:Boutique")->findAll();
        $produit = $em->getRepository("CRShopBundle:Produits")->findAll();
        $user = $this->getUser();


        return $this->render('CRShopBundle:Default:boutique.html.twig', array(
            'boutiques'=>$boutique,
            'produits'=>$produit,
            'user'=>$user,
            'id'=>$id
        ));
    }



}
