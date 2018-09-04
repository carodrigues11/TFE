<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VendeurController extends Controller
{
    public function indexAction()
    {
        return $this->render('CRShopBundle:Default:vendeur.html.twig');
    }
}
