<?php
//Chemin depuis src
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController{
    //Annotations pour la route
    /**
     * @Route("/", name="home")
     */

     public function Home(){
       return $this->render('main/home.html.twig', [
           'name' => 'Benjamin'
       ]);
     }
}
?>