<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     */
    public function index(CustomerRepository $repo)
    {
        /*grace au parametre CustomerRepository $repo =>
        $repo = $this->getDoctrine()->getRepository(Customer::class);*/

        $customers = $repo->findAll();
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController', 'customers' => $customers
        ]);
    }


    /**
     * @Route("/customer/{id}", name="customer_change")
     */
    public function change(Customer $customer/*,$id*/)
    {
        /*grace au parametre Customer $customer =>
        $repo = $this->getDoctrine()->getRepository(Customer::class);

        $customer = $repo->find($id);*/
    return $this->render('customer/change.html.twig', ['customer' => $customer]);
    }
}
