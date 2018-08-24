<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AproposController extends Controller
{
    public function indexAction()
    {
        return $this->render('CRShopBundle:Default:apropos.html.twig');
    }
}
