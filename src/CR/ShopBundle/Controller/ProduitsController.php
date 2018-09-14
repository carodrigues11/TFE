<?php

namespace CR\ShopBundle\Controller;

use CR\ShopBundle\Entity\Produits;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;




class ProduitsController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();

        $value = "";

        $em = $this->getDoctrine()->getEntityManager();
        $produit = $em->getRepository("CRShopBundle:Produits")->findAll();
        $boutiques = $em->getRepository("CRShopBundle:Boutique")->findAll();
        $user = $this->getUser();


        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        return $this->render('CRShopBundle:Default:produits.html.twig', array(
            'produits'=>$produit,
            'panier'=> $panier,
            'boutiques'=>$boutiques,
            'user'=>$user
        ));
    }





    public function produitsAction()
    {

        $request = $this->get('request_stack')->getCurrentRequest();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getEntityManager();

        $produit = $em->getRepository("CRShopBundle:Produits")->findBy(array('disponible'=>1));

        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        return $this->render('CRShopBundle:Default:produits.html.twig', array(
            'produits'=>$produits,
        ));

    }





    public function ajoutAction(Request $request){
        // On crée un objet Advert
        $produit = new Produits();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->createFormBuilder($produit);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('boutiqueId',     IntegerType::class)
            ->add('nom',     TextType::class)
            ->add('description',   TextareaType::class)
            ->add('prix',   NumberType::class)
            ->add('promo',   IntegerType::class)
            ->add('prixGrossiste',   IntegerType::class)
            ->add('quantite',   IntegerType::class)
            ->add('bio',   CheckboxType::class)
            ->add('gluten',   CheckboxType::class)
            ->add('image',   TextType::class)
            ->add('imageID',   TextType::class)
            ->add('categories',   IntegerType::class)
            ->add('publie',   CheckboxType::class)
            ->add('dateCreation',      DateType::class)
            ->add('Ajouter le produit',      SubmitType::class)
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




        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('CRShopBundle:Vendeur:ajoutproduit.html.twig', array(
            'form' => $form->createView()
        ));


    }



}
