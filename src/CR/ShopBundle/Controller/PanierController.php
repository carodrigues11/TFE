<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;



class PanierController extends Controller
{

    public function indexAction(){

        $session = $this->getRequest()->getSession();
        if(!$session->has('panier')) $session->set('panier',array());

        var_dump($session->get('panier'));

        return $this->render('CRShopBundle:Default:panier.html.twig');
    }



    public function ajouterAction(Request $request, $id)
    {
        $request = Request::createFromGlobals();
        $session = new Session();

        if(!$session->has('panier')) $session->set('panier', array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            if ($request->query->get('quantite') != null)
            {
                $panier[$id] = $request->query->get('quantite');
            }else{
                if ($request->query->get('quantite') != null) $panier[$id] = $request->query->get('quantite');
                else
                    $panier[$id] = 1;
            }
        }
        $session->set('panier', $panier);

        return new RedirectResponse($this->generateUrl('produits'));

    }





}
