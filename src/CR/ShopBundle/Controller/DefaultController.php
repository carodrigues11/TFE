<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $boutique = $em->getRepository("CRShopBundle:Boutique")->findAll();



        return $this->render('CRShopBundle:Default:accueil.html.twig', array(
            'boutiques'=>$boutique,
        ));
    }



    public function conditionAction()
    {
        return $this->render('CRShopBundle:Default:condition.html.twig');

    }

}
