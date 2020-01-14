<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Customer::class);

        $customers = $repo->findAll();
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController', 'customers' => $customers
        ]);
    }
}
