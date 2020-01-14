<?php
namespace App\Controller\Equipment;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipmentController extends AbstractController {

  /**
   *  @Route("/equipment", name="equipment.list")
   */
  public function list() {
    return $this->render('equipment/list.html.twig');
  }
}