<?php

namespace App\Controller\SupperAdmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="app_login")
 */
class SupperAdminPageController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->json('admin');
    }
}