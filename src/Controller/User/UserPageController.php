<?php


namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="app_login")
 */
class UserPageController extends AbstractController
{
    /**
     * @Route("")
     */
    public function index()
    {
        dd($this->getUser());
        return $this->json('user');
    }
}