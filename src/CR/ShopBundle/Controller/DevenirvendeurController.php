<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DevenirvendeurController extends Controller
{
    public function indexAction()
    {

        return $this->render('CRShopBundle:Default:devenirvendeur.html.twig');
    }
}
