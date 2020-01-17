<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController {

  /**
  * @var EntityManagerInterface
  */
  private $manager;

  public function __construct(EntityManagerInterface $manager)
  {
      $this->manager = $manager;
  }

  /**
   * @Route("/booking", name="booking.list")
   */
  public function list(BookingRepository $repository) {
    $bookings = $repository->findAll();
    return $this->render('booking/list.html.twig', [
      'bookings' => $bookings
    ]);
  }

  /**
   * @Route("/booking-{id}/delete", name="booking.delete")
   */
  public function delete(Booking $booking) {
    $this->manager->remove($booking);
    $this->manager->flush();
    $this->addFlash('success', 'Réservation supprimé avec succès');
    return $this->redirectToRoute('booking.list');
  }
}