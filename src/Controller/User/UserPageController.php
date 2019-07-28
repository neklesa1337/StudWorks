<?php


namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserPageController extends AbstractController
{
    /**
     * @Route("")
     */
    public function index()
    {
        return $this->json('user');
    }
}