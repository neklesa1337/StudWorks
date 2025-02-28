<?php

namespace App\Controller\Main;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("", methods={"GET"}, name="main_page")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }
}
