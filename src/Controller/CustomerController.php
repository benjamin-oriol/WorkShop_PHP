<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
/*liste des clients*/
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



/*creation/modification fiche nouveau client*/
    /**
     * @Route("/customer/create", name="customer_create")
     * @Route("/customer/{id}/edit", name="customer_edit")
     */
    public function form(Request $request, EntityManagerInterface $manager, Customer $customer= null) {

        if (!$customer){
        $customer = new Customer();
        }

     /*    $form = $this->createFormBuilder($customer)
                        ->add('firstname')
                        ->add('lastname')
                        ->add('email')
                        ->add('adress')
                        ->add('phone')
                        ->add('birth_date')
                        ->add('coastal_license')
                        ->add('reduction') 
                        ->getForm();*/

        $form= $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($customer);
            $manager->flush();
            return $this->redirectToRoute('customer');
        }
    
        
        return $this->render('customer/create.html.twig', [
            'formCustomer' => $form->createView(),
            'editMode' => $customer->getId() !== null
            ]);
    }
}