<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use CR\ShopBundle\Entity\Messages;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProducteursController extends Controller
{
    public function indexAction()
    {

        $request = $this->get('request_stack')->getCurrentRequest();

        $em = $this->getDoctrine()->getEntityManager();
        $listeBoutique = $em->getRepository("CRShopBundle:Boutique")->findAll();


        $boutique  = $this->get('knp_paginator')->paginate(
            $listeBoutique,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            5/*nbre d'éléments par page*/
        );

        return $this->render('CRShopBundle:Default:producteurs.html.twig', array(
            'boutiques'=>$boutique
        ));




    }



    public function viewAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $boutique = $em->getRepository("CRShopBundle:Boutique")->findAll();
        $produit = $em->getRepository("CRShopBundle:Produits")->findAll();
        $user = $this->getUser();

        //Date du jour
        $annee = date("y");
        $mois = date("m");
        $jour = date("d");

        if ($this->getUser() != null) {

            $userId = $this->getUser()->getId();
        } else {
            $userId = 0;
        }
        // On crée un objet Produit
        $message = new Messages();

        $em = $this->getDoctrine()->getEntityManager();


        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->createFormBuilder($message);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('userId', HiddenType::class, array(
                'data' => $userId
            ))
            ->add('boutiqueId', HiddenType::class, array(
                'data' => $id
            ))
            ->add('titre', TextType::class)
            ->add('message', TextareaType::class)
            ->add('date', DateType::class)
            ->add('Envoyer le message', SubmitType::class);
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();


        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($message);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Message envoyé.');


                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('boutique', array('id' => $id));
            }
        }


        return $this->render('CRShopBundle:Default:boutique.html.twig', array(
            'boutiques' => $boutique,
            'produits' => $produit,
            'user' => $user,
            'id' => $id,
            'form' => $form->createView(),

        ));



    }

}
