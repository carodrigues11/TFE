<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilvendeuroccController extends Controller
{
    public function indexAction()
    {

        return $this->render('CRShopBundle:Default:creationprofilvendeurocc.html.twig');
    }
}
