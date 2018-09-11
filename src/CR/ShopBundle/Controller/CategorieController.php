<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function indexAction($id)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $categorie = $em->getRepository("CRShopBundle:Categories")->findAll();
        $produit = $em->getRepository("CRShopBundle:Produits")->findAll();



        return $this->render('CRShopBundle:Default:categorie.html.twig', array(
            'categorie'=>$categorie,
            'produits'=>$produit,
            'id'=>$id
        ));

    }


}
