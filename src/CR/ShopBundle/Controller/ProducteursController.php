<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class ProducteursController extends Controller
{
    public function indexAction()
    {

        $request = $this->get('request_stack')->getCurrentRequest();

        $em = $this->getDoctrine()->getEntityManager();
        $listeBoutique = $em->getRepository("CRShopBundle:Boutique")->findAll();


        $boutique  = $this->get('knp_paginator')->paginate(
            $listeBoutique,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            5/*nbre d'éléments par page*/
        );

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
