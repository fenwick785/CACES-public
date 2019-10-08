<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvaluateController extends AbstractController
{
    /**
     * @Route("/evaluate", name="evaluate")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Question::class);

        $questionRepositary1 = $repository -> findQuestion1();
        $questionRepositary2 = $repository -> findQuestion2();
        $questionRepositary3 = $repository -> findQuestion3();
        $questionRepositary4 = $repository -> findQuestion4();
        $questionRepositary5 = $repository -> findQuestion5();

        return $this->render('evaluate/index.html.twig', [
            'question1' => $questionRepositary1,
            'question2' => $questionRepositary2,
            'question3' => $questionRepositary3,
            'question4' => $questionRepositary4,
            'question5' => $questionRepositary5,
        ]);
    }

    /**
     * @route("/evaluate/prenium/test", name="evaluate_test")
     */
    public function test()
    {
        $repository = $this->getDoctrine()->getRepository(Question::class);

        $questionRepositary1 = $repository -> findQuestion1();
        $questionRepositary2 = $repository -> findQuestion2();
        $questionRepositary3 = $repository -> findQuestion3();
        $questionRepositary4 = $repository -> findQuestion4();
        $questionRepositary5 = $repository -> findQuestion5();





        return $this->render('evaluate/practiceTest.html.twig', [
            'question1' => $questionRepositary1,
            'question2' => $questionRepositary2,
            'question3' => $questionRepositary3,
            'question4' => $questionRepositary4,
            'question5' => $questionRepositary5,
        ]);
    }


    
}
