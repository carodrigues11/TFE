<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use CR\ShopBundle\Entity\Boutique;

class MapController extends Controller
{
    public function indexAction()
    {

        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();

        $em = $this->getDoctrine()->getEntityManager();

        $users = $em->getRepository("AppBundle:User")->findAll();
        $boutiques = $em->getRepository("CRShopBundle:Boutique")->findAll();






        return $this->render('CRShopBundle:Default:map.html.twig', array(
            'users' => $users,
            'boutiques' => $boutiques,
        ));
    }
}
