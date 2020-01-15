<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
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

/*creation fiche nouveau client*/
    /**
     * @Route("/customer/create", name="customer_create")
     */
    public function create(Request $request, EntityManagerInterface $manager) {

        
        $customer = new Customer();

        $form = $this->createFormBuilder($customer)
                        ->add('firstname')
                        ->add('lastname')
                        ->add('email')
                        ->add('adress')
                        ->add('phone')
                        ->add('birth_date')
                        ->add('coastal_license')
                        ->add('reduction')
                        ->getForm();
        return $this->render('customer/create.html.twig',['formCustomer' => $form->createView()]);
    }


/*fiche client (visu/modif)*/
    /**
     * @Route("/customer/{id}", name="customer_change")
     */
    public function change(Customer $customer/*,$id*/)
    {
        
        /*grace au parametre Customer $customer =>
        $repo = $this->getDoctrine()->getRepository(Customer::class);

        $customer = $repo->find($id);*/

    return $this->render('customer/change.html.twig',  ['customer' => $customer]);
    }


}
