<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $persons = [
            "John",
            "James",
            "Will",
            "Peter",
            "Tom",
        ];

        $cars = [
            "Chevrolet",
            "Mercedes",
            "BMW",
            "Toyota",
            "Nissan",
            "Ford",
            "Bugatti",
            "Alfa Romeo",
            "Audi",
            "Peugeot",
            "Hyundai",
            "Citroen",
            "KIA",
            "Lexus",
            "Mazda",
        ];

        foreach ($persons as $person_item) {
            $person = new Person();
            $person->setName($person_item);
            $person->setAge(rand(20, 75));
            $person->setWeight(rand(50, 100));
            for ($i = 0; $i < 3; $i++) {
                $car = new Car();
                $car->setTitle(array_pop($cars));
                $car->setPrice(rand(1000000, 10000000));
                $manager->persist($car);
                $person->addCar($car);

            }
            $manager->persist($person);
        }

        $manager->flush();
    }
}
