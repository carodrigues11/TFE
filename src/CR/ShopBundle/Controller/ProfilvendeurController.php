<?php

namespace CR\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CR\ShopBundle\Entity\Boutique;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProfilvendeurController extends Controller
{
    public function indexAction(Request $request)
    {

        $user = $this->getUser();
        $userManager = $this->container->get('fos_user.user_manager');


        // On crée un objet Advert
        $boutique = new Boutique();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $boutique);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('dateInscription',      DateType::class)
            ->add('userId',     IntegerType::class)
            ->add('nom',   TextType::class)
            ->add('adresseBoutique',    TextType::class)
            ->add('codePostal',    TextType::class)
            ->add('image',    TextType::class)
            ->add('ville',    TextType::class)
            ->add('pays',    TextType::class)
            ->add('description',    TextareaType::class)
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
                $em->persist($boutique);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');



                //On ajoute le rôle admin à l'utilisateur
                $user->addRole("ROLE_VENDEUR");

                $em->persist($user);
                $em->flush();







                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('vendeur', array('id' => $boutique->getId()));
            }
        }



        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('CRShopBundle:Default:creationprofilvendeur.html.twig', array(
            'form' => $form->createView(),
            'user' => $user,
        ));


    }
}
