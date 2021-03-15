<?php

namespace App\Controller;

use App\Entity\User;

use App\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    /**
     * @Route ("/ajout_utilisateur", name="ajout_utilisateur")
     */
    public function AjoutUtilisateur (Request $request): Response
    {
        $user= new User();

        $form=$this->createForm(UserType::class);

        $form->handleRequest($request);
        if($form->isSubmitted()){

            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();



        }

        return $this->render('user/ajout_utilisateur.html.twig',[
            'form'=>$form->createView()
            ]);
    }
}
