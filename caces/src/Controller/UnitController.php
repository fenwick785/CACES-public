<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UnitController extends AbstractController
{
    /**
     * @Route("/unit", name="unit")
     */
    public function index()
    {
        return $this->render('unit/index.html.twig', [
            'controller_name' => 'UnitController',
        ]);
    }
}
