<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnotherController extends Controller
{
    /**
     * @Route("/another/{thing}/{and}", name="another")
     */
    public function anotherAction($and, $thing)
    {
        return $this->render('another/new_template.html.twig');
    }
}