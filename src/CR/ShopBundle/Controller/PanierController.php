<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use CR\ShopBundle\Entity\Produits;
use CR\ShopBundle\Form\ProduitsType;


class PanierController extends Controller
{
    public function ajouterAction($i)
    {
        return $this->redirect($this->generateUrl('produits'));

    }

    public function supprimerAction($i)
    {
        return $this->redirect($this->generateUrl('produits'));
    }



}
