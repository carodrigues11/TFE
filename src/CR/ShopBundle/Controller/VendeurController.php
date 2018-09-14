<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CR\ShopBundle\Entity\Produits;
use Symfony\Component\HttpFoundation\Response;

class VendeurController extends Controller
{
    public function indexAction()
    {

        $user = $this->getUser();


        return $this->render('CRShopBundle:Vendeur:menuvendeur.html.twig', array(
            'user'=>$user,
        ));
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

        $userId = $this->getUser()->getId();
        $infos = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);



        return $this->render('CRShopBundle:Vendeur:info.html.twig', array(
            'infos'=> $infos,
        ));
    }


    public function  supprimerAction(Produits $produit){

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($produit);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success','Produit bien supprimé');


        return $this->render('CRShopBundle:Vendeur:mesproduits.html.twig');


    }


}
