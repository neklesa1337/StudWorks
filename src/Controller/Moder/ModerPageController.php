<?php


namespace App\Controller\Moder;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moder", name="app_login")
 */
class ModerPageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->json('moder');
    }
}