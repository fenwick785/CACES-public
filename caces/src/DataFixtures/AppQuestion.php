<?php

namespace App\DataFixtures;
use Faker;
use Faker\Factory;
use App\Entity\Lesson;
use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppQuestion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // on configure la langue de nos faker
        $faker = Faker\Factory::create('fr_FR');


        // On créé 500 questions aléatoirement
        for ($i = 0; $i < 500; $i++) {
            $question = new Question();
            $question->setTheme($faker -> numberBetween($min = 1, $max = 5));
            $question->setQuestion($faker -> text($maxNbChars = 200));
            $question->setCorrection($faker -> text($maxNbChars = 200));
            $question->setAnswer($faker -> boolean());
            $question->setLearnTheme($faker -> numberBetween($min = 1, $max = 30));
            $manager->persist($question);
        }

        $manager->flush();
    }
}
