<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VendeurController extends Controller
{
    public function indexAction()
    {

        $user = $this->getUser();


        return $this->render('CRShopBundle:Vendeur:vendeur.html.twig');
    }


    public function showAction()
    {

        $userId = $this->getUser()->getId();


        $em = $this->getDoctrine()->getEntityManager();
        $boutiqueId = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);
        $produits = $em->getRepository("CRShopBundle:Produits")->findBy(['boutiqueId'=>$boutiqueId]);



        return $this->render('CRShopBundle:Vendeur:mesproduits.html.twig',array(
            'produits'=>$produits
        ));
    }

    public function venteAction()
    {



        return $this->render('CRShopBundle:Vendeur:mesventes.html.twig');
    }

    public function messageAction()
    {



        return $this->render('CRShopBundle:Vendeur:message.html.twig');
    }

    public function commentAction()
    {



        return $this->render('CRShopBundle:Vendeur:comment.html.twig');
    }

    public function infoAction()
    {

        $em = $this->getDoctrine()->getEntityManager();

        $userId = $this->getUser();
        $infos = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);


        return $this->render('CRShopBundle:Vendeur:info.html.twig', array(
            'infos'=> $infos,
        ));
    }



}
