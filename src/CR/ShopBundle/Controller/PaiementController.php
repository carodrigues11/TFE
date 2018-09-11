<?php

namespace CR\ShopBundle\Controller;

use GuzzleHttp\Psr7\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PaiementController extends Controller
{
    public function indexAction()
    {



        return $this->render('CRShopBundle:Default:paiement.html.twig');
    }
}
