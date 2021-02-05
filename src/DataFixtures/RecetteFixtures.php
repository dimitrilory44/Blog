<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecetteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recettes = [];

        $recette1 = new Recette();
        $recette2 = new Recette();

        $recette1->setTitre("Escalope de poulet à la moutarde")
                ->setImage("https://www.unjourunerecette.fr/images/recette-escalope-de-poulet-a-la-moutarde.jpg")
                ->setPreparation(15)
                ->setCuisson(15)
                ->setDescription("Lorem Ipsum")
                ->setPersonne(3);

        $recette2->setTitre("Flammeküeche")
            ->setImage("https://scontent-cdg2-1.xx.fbcdn.net/v/t1.15752-9/145896991_249971976581376_6873919005615607893_n.jpg?_nc_cat=100&ccb=2&_nc_sid=ae9488&_nc_ohc=sGtuWCkrw_YAX_M02Jh&_nc_ht=scontent-cdg2-1.xx&oh=cceda2b897e77d153cf5d918a0681f4a&oe=604352AC")
            ->setPreparation(7)
            ->setCuisson(12)
            ->setDescription("Lorem Ipsum")
            ->setPersonne(2);

        $manager->persist($recette1);
        $manager->persist($recette2);

        // $product = new Product();
        // $manager->persist($product);

        $recettes[] = $recette1;
        $recettes[] = $recette2;

        $manager->flush();
    }
}
