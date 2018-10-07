<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CR\ShopBundle\Entity\Produits;
use CR\ShopBundle\Entity\Messages;
use Symfony\Component\HttpFoundation\Response;

class VendeurController extends Controller
{
    public function indexAction()
    {



        return $this->render('CRShopBundle:Vendeur:menuvendeur.html.twig', array(
            'user' => $user,
        ));

    }


    public function showAction()
    {

        if( $this->isGranted('IS_AUTHENTICATED_FULLY') ) {


            $userId = $this->getUser()->getId();
            $userName = $this->getUser()->getUsername();


            $request = $this->get('request_stack')->getCurrentRequest();


            $em = $this->getDoctrine()->getEntityManager();
            $boutiqueId = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);
            $produits = $em->getRepository("CRShopBundle:Produits")->findBy(['boutiqueId'=>$boutiqueId]);





            return $this->render('CRShopBundle:Vendeur:mesproduits.html.twig',array(
                'produits'=>$produits,
                'user'=>$userName
            ));
        } else {

            return $this->render('CRShopBundle:Default:accueil.html.twig');
        }

    }

    public function venteAction()
    {


        $userName = $this->getUser()->getUsername();


        if($this->getUser() != null ) {
            if( $this->isGranted('ROLE_VENDEUR_OCC') ) {
                return $this->render('CRShopBundle:Vendeur:error.html.twig');
            }



            $userId = $this->getUser()->getId();


            $em = $this->getDoctrine()->getEntityManager();
            $boutique = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);
            $boutiqueId = $boutique->getId();
            $commandes = $em->getRepository("CRShopBundle:Commandes")->findBy(['boutiqueId'=>$boutiqueId]);

            for($i=0;$i<count($commandes);$i++){
                $commandeId[] = $commandes[$i]->getId();
            }

            $commPro = $em->getRepository("CRShopBundle:Commande_produit")->findBy(['commandeId'=>$commandeId]);

            for($i=0;$i<count($commPro);$i++){
                $commProProId[] = $commPro[$i]->getProduitId();
                $commProComId[] = $commPro[$i]->getCommandeId();
            }

            $produits = $em->getRepository('CRShopBundle:Produits')->findBy(['id'=>$commProProId]);




            for($i=0;$i<count($produits);$i++){
                $produitsId[] = $produits[$i]->getId();
            }




            /*
            for($i=0;$i<count($commandes);$i++){
                $commandeId[] = $commandes[$i]->getId();
            }

            $commPro = $em->getRepository("CRShopBundle:Commande_produit")->findBy(['commandeId'=>$commandeId]);

            for($i=0;$i<count($commPro);$i++){
                $commProProId[] = $commPro[$i]->getProduitId();
                $commProComId[] = $commPro[$i]->getCommandeId();

            }
            $produitsId = $em->getRepository('CRShopBundle:Produits')->findBy(['id'=>$commProProId]);



            //$produits = $em->getRepository("CRShopBundle:Produits")->findBy(['id'=>$produitsId]);
*/

/*
            echo '<pre>';
            var_dump($commandes);
            die();
*/


            return $this->render('CRShopBundle:Vendeur:mesventes.html.twig', array(
                'user'=>$userName,
                'commandes'=>$commandes,
                'commandeId'=>$commandeId,
                'produits'=>$produits,
                'produitsId'=>$produitsId,
                'commProProId'=>$commProProId,
                'commProComId'=>$commProComId,
                'commPro'=>$commPro,
            ));


        } else {
            return $this->redirect($this->generateUrl('produits'));
        }
    }

    public function messageAction()
    {

        $userName = $this->getUser()->getUsername();

        if($this->getUser() != null ) {

            if( $this->isGranted('ROLE_VENDEUR_OCC') ) {
                return $this->render('CRShopBundle:Vendeur:error.html.twig');
            }

            $userId = $this->getUser()->getId();
            $em = $this->getDoctrine()->getEntityManager();

            $boutiqueId = $em->getRepository("CRShopBundle:Boutique")->findBy(['userId'=>$userId]);
            $messages = $em->getRepository("CRShopBundle:Messages")->findBy(['boutiqueId'=>$boutiqueId]);
            $auteurs = $em->getRepository("AppBundle:User")->findAll();



            return $this->render('CRShopBundle:Vendeur:message.html.twig', array(
                'user'=>$userName,
                'messages'=>$messages,
                'auteurs'=>$auteurs,
            ));

        } else {
            return $this->redirect($this->generateUrl('vendeur_error'));
        }

    }

    public function commentAction()
    {

        $userName = $this->getUser()->getUsername();

        if($this->getUser() != null ) {

            if( $this->isGranted('ROLE_VENDEUR_OCC') ) {
                return $this->render('CRShopBundle:Vendeur:error.html.twig');
            }

            $userId = $this->getUser()->getId();


            $em = $this->getDoctrine()->getEntityManager();
            $comments = $em->getRepository("CRShopBundle:Commentaires")->findBy(['userId'=>$userId]);



            return $this->render('CRShopBundle:Vendeur:comment.html.twig', array(
                'user'=>$userName,
                'comments'=>$comments
            ));

        } else {
            return $this->redirect($this->generateUrl('vendeur_error'));
        }
    }

    public function infoAction()
    {

        $userName = $this->getUser()->getUsername();

        $em = $this->getDoctrine()->getEntityManager();

        if($this->getUser() != null ) {
            if( $this->isGranted('ROLE_VENDEUR_OCC') ) {
                return $this->render('CRShopBundle:Vendeur:error.html.twig');
            }

            $userId = $this->getUser()->getId();

            $infos = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);



            return $this->render('CRShopBundle:Vendeur:info.html.twig', array(
                'infos'=> $infos,
                'user'=>$userName
            ));
        } else {
            return $this->redirect($this->generateUrl('produits'));
        }


/*

         if($this->getUser() != null ) {

            $em = $this->getDoctrine()->getEntityManager();
            $userId = $this->getUser()->getId();


            $infos = $em->getRepository("CRShopBundle:Boutique")->findOneBy(['userId'=>$userId]);



            // On crée le FormBuilder grâce au service form factory
            $formBuilder = $this->createFormBuilder($infos);

            // On ajoute les champs de l'entité que l'on veut à notre formulaire
            $formBuilder
                ->add('dateInscription',      DateType::class, array(
                    'placeholder' => array(
                        'year' => $today['year'], 'month' => $today['mon'], 'day' => $today['mday']
                    )
                ))
                ->add('userId',     HiddenType::class, array(
                    'data' => $userId
                ))
                ->add('nom',   TextType::class, array(
                    'data' => $infos->getNom(),
                ))
                ->add('adresseBoutique',    TextType::class, array(
                    'data' => $infos->getAdresse(),
                ))
                ->add('codePostal',    TextType::class, array(
                    'data' => $infos->getCodePostal(),
                ))
                ->add('image',    TextType::class, array(
                    'data' => $infos->getImage(),
                ))
                ->add('ville',    TextType::class, array(
                    'data' => $infos->getVille(),
                ))
                ->add('pays',    TextType::class, array(
                    'data' => $infos->getPays(),
                ))
                ->add('description',    TextareaType::class, array(
                    'data' => $infos->getDescription(),
                ))
                ->add('latitude',    HiddenType::class, array(
                    'data' => $infos->getLatitude(),
                ))
                ->add('longitude',    HiddenType::class, array(
                    'data' => $infos->getLongitude(),
                ))
                ->add('save',      SubmitType::class)
            ;
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
                    $em->persist($produit);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');



                    // On redirige vers la page de visualisation de l'annonce nouvellement créée
                    return $this->redirectToRoute('vendeur', array('id' => $produit->getId()));
                }

            }



            return $this->render('CRShopBundle:Vendeur:info.html.twig', array(
                'infos'=> $infos,
                'form' => $form->createView()
            ));

        } else {
            return $this->redirect($this->generateUrl('produits'));
        }

*/
    }


    public function  supprimerAction(Produits $produit){

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($produit);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success','Produit bien supprimé');


        return $this->redirect($this->generateUrl('vendeur'));


    }

    public function  errorAction(Produits $produit){


        return $this->render('CRShopBundle:Vendeur:error.html.twig');


    }


}
