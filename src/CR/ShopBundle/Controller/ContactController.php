<?php

namespace CR\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Mailer\Mailer;

class ContactController extends Controller
{
    public function indexAction()
    {




        return $this->render('CRShopBundle:Default:contact.html.twig');
    }



    function contactAction(Mailer $request)
    {
        $message = \App\Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'objet' => $request->objet,
            'content' => $request->content,
        ]);

        // return new ContactFormSite($message);
        \Mail::to(env('CONTACT_SITE_EMAIL'))->send(new ContactFormSite($message));
        flash('Merci pour votre message, votre demande sera traitée dans 
              les plus brèfs délais !')->success();
        return redirect()->back();


    }
}
