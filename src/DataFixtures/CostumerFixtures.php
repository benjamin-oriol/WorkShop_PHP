<?php

// src/DataFixtures/FakerFixtures.php
namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CostumerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 2 personnes
        for ($i = 1; $i <=10;$i++) {
            if ( $i%2 != 0 ){
            $customer = new Customer();
            $customer->setFirstname($faker->name);
            $customer->setLastname($faker->name);
            $customer->setEmail($faker->email);
            $customer->setAdress($faker->address);
            $customer->setPhone($faker->phoneNumber);
            $customer->setBirthDate($faker->dateTimeThisCentury);
            $customer->setCoastalLicense('jdgzibz-'.$i);
            $customer->setReduction(Null);
            
            $manager->persist($customer);
        }
        else {
            $customer = new Customer();
            $customer->setFirstname($faker->name);
            $customer->setLastname($faker->name);
            $customer->setEmail($faker->email);
            $customer->setAdress($faker->address);
            $customer->setPhone($faker->phoneNumber);
            $customer->setBirthDate(NULL);
            $customer->setCoastalLicense(NULL);
            $customer->setReduction(Null);
            
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
}


/*ancienne boucle de fixture

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
                
                $manager->persist($customer);
            }
        }           

        $manager->flush();
    }
}*/