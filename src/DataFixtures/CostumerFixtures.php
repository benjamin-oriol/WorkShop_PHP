<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Customer;

class CostumerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 1; $i <=15;$i++) {
            if ( $i%2 != 0 ){
                $customer = new Customer();
                $customer->setFirstname("Die".$i);
                $customer->setLastname($i);
                $customer->setEmail($i."@Gmail.fr");
                $customer->setAdress($i." rue des diables 38510 vezeronce");
                $customer->setPhone("050609070".$i);
                $customer->setBirthDate(NULL);
                $customer->setCoastalLicense(NULL);
                $customer->setReduction(NULL);
                /*preparer le manager à persister les données*/
                $manager->persist($customer);
                }
            else {
                $customer = new Customer();
                $customer->setFirstname("Gret".$i);
                $customer->setLastname($i);
                $customer->setEmail($i."@sfr.fr");
                $customer->setAdress($i." rue des anges 38510 morestel");
                $customer->setPhone("050609070".$i);
                $customer->setBirthDate(NULL);
                $customer->setCoastalLicense("czecs566666".$i);
                $customer->setReduction(NULL);
                /*preparer le manager à persister les données*/
                $manager->persist($customer);
            }
        }           

        $manager->flush();
    }
}