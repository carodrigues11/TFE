<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;



class PanierController extends Controller
{


    public function menuAction()
    {
        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();

        if(!$session->has('panier'))
            $produits = 0;
        else
            $produits = count($session->get('panier'));

        return $this->render('CRShopBundle:Default:quantite.html.twig', array(
            'produits'=>$produits,
        ));
    }

    public function  supprimerAction($id){
        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $panier = $session->get('panier');

        if(array_key_exists($id, $panier)){
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Produit bien supprimé');
        }

        return new RedirectResponse($this->generateUrl('panier'));

    }



    public function ajouterAction(Request $request, $id)
    {
        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();

        if(!$session->has('panier')) $session->set('panier', array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            if ($request->query->get('quantite') != null) $panier[$id] = $request->query->get('quantite');
            $this->get('session')->getFlashBag()->add('success','Quantité modifiée');



        }else{
                if ($request->query->get('quantite') != null)
                    $panier[$id] = $request->query->get('quantite');
                else
                    $panier[$id] = 1;
            $this->get('session')->getFlashBag()->add('success','Produit bien ajouté');


        }
        $session->set('panier', $panier);



        return new RedirectResponse($this->generateUrl('panier'));

    }

    public function indexAction(){

        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        if(!$session->has('panier')) $session->set('panier',array());

        //A partir de l'ID du produit, récupérer les infos du produit ajouté
        $em = $this->getDoctrine()->getEntityManager();
        $produits = $em->getRepository('CRShopBundle:Produits')->findArray(array_keys($session->get('panier')));


        return $this->render('CRShopBundle:Default:panier.html.twig',array(
            'produits'=>$produits,
            'panier'=>$session->get('panier')
        ));
    }





}
