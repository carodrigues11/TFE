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

    public function checkoutAction()
    {



        \Stripe\Stripe::setApiKey("sk_test_5LsCslQIJ4K5M6eV818LQMoU");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => 1000, // Amount in cents                            -> A Modifier Dynamiquement
                "currency" => "eur",
                "source" => $token,
                "description" => "Paiement Stripe - PRE DE CHEZ VOUS!"
            ));



            $this->addFlash("success","Bravo ça marche !");
            return $this->redirect($this->generateUrl('panier'));
        } catch(\Stripe\Error\Card $e) {

            $this->addFlash("error","Snif ça marche pas :(");
            return $this->redirectToRoute("order_prepare");
            // The card has been declined
        }




    }

}
