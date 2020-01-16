<?php

namespace App\Controller;

use App\Entity\ChangePassword;
use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Notifications\Security\ChangePasswordNotification;
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
     * @Route ("/change-password", name="change-password")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder, ChangePasswordNotification $notification) {
        $changePassword = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePassword);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getUser()->setPassword($passwordEncoder->encodePassword($this->getUser(), $changePassword->getNewPassword()));
            $this->manager->persist($this->getUser());
            $this->manager->flush($this->getUser());
            $notification->notify($this->getUser());
            $this->addFlash('success', 'Votre mot de passe a été modifié avec success');
            return $this->redirectToRoute('parameters');
        }

        return $this->render('security/change-password.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/connexion", name="security_login")
     *
     */
    public function login(AuthenticationUtils $authentication) {
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
