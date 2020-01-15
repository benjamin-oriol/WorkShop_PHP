<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
                        ->add('firstname', TextType::class, [
                            'label' => 'Nom',
                            'attr' => ['placeholder' => "Nom du client", 'class' => 'form-control']
                        ])
                        ->add('lastname', TextType::class, [
                            'label' => 'Prenom',
                            'attr' => ['placeholder' => "Prenom du client", 'class' => 'form-control']
                        ])
                        ->add('email', EmailType::class, [
                            'label' => 'Email',
                            'attr' => ['placeholder' => "Email du client", 'class' => 'form-control']
                        ])
                        ->add('adress', TextType::class, [
                            'label' => 'Adresse',
                            'attr' => ['placeholder' => "Adresse du client", 'class' => 'form-control']
                        ])
                        ->add('phone', TelType::class, [
                            'label' => 'Telephone',
                            'attr' => ['placeholder' => "Telephone du client", 'class' => 'form-control']
                        ])
                        ->add('birth_date',  BirthdayType::class, [
                            'label' => 'Date d\'anniversaire',
                            'attr' => ['class' => 'form-control']
                            ])
                        ->add('coastal_license', TextType::class, [
                            'label' => 'Permis Cotier',
                            'attr' => ['placeholder' => "Permis Cotier du client", 'class' => 'form-control']
                        ])
                        ->add('reduction', NumberType::class, [
                            'label' => 'reduction',
                            'attr' => ['class' => 'form-control']
                            ])
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
