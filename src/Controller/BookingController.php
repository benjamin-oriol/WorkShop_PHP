<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController {

  /**
   * @Route("/booking", name="booking")
   */
  public function list(BookingRepository $repository) {
    $bookings = $repository->findAll();
    return $this->render('booking/list.html.twig', [
      'bookings' => $bookings
    ]);
  }
}