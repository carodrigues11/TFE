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

        return $this->render('CRShopBundle:Vendeur:mesproduits.html.twig');


    }



}
