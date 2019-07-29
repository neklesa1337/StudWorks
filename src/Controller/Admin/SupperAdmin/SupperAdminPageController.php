<?php

namespace App\Controller\Admin\SupperAdmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="app_login")
 */
class SupperAdminPageController extends AbstractController
{
    /**
     * @Route("/orders")
     */
    public function index()
    {
        return $this->render('admin/admin/orders/index.html.twig');
    }
}