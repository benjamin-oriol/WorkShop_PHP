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

    /**
     * @Route("/customer/{id}", name="customer_change")
     */
    public function change($id)
    {
        $repo = $this->getDoctrine()->getRepository(Customer::class);

        $customer = $repo->find($id);
    return $this->render('customer/change.html.twig', ['customer' => $customer]);
    }
}
