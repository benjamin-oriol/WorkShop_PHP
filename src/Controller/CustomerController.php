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


/*suppression d'un client*/
    /**
     * @Route("/customer/{id}/delete", name="customer_delete")
     */
    public function delete(Customer $customer) {
        $this->manager->remove($customer);
        $this->manager->flush();
        $this->addFlash('success', 'client supprimé avec succès');
        return $this->redirectToRoute('customer');
    }
}