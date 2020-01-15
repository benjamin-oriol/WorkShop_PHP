<?php

//Repère de l'emplacement du controller
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//AbstractController permet l'acces à la methode render
class StaffController extends AbstractController{
    //Annotations pour la route
    /**
     * @Route("/staff", name="staff")
     */

     public function Staff( UserRepository $userRepository){

        $listUser = $userRepository->findAll();
        
         return $this->render('staff/staff.html.twig', [
             'users' => $listUser
         ]);
     }

     //Annotations pour la route
    /**
     * @Route("/staff-{id}", name="staff.detail")
     */
     public function view (User $user){
        return $this->render('staff/detail.html.twig', [
            'user' => $user
        ]);
     }
}
?>