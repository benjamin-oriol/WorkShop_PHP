<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    //Attributs
    private $manager;

    //Déclaration du constructor
    public function __construct(EntityManagerInterface $manager){
        $this->manager = $manager;
    }

    /**
     * @Route ("/inscription", name="security_registration")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder) {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        //Tu analyse la requte envoyée
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $this->manager->persist($user);
            $this->manager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/connexion", name="security_login")
     *
     */
    public function login( AuthenticationUtils $authentication, Request $request) {
        $error= $authentication->getLastAuthenticationError();
        $lastusername= $authentication->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error'=>$error,
            'lastusername'=>$lastusername
        ]); 
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {

    }
}
