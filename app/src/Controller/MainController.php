<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function index(ObjectManager $manager)
    {
        $randPerson = $manager->getRepository(Person::class)->getRandomPerson();
        $randPerson = array_shift($randPerson);

        return $this->render("index.html.twig", [
            "person" => $randPerson
        ]);
    }
}
