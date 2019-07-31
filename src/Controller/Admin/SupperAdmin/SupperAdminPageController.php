<?php

namespace App\Controller\Admin\SupperAdmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class SupperAdminPageController extends AbstractController
{
    /**
     * @Route("/orders", name="admin_orders")
     */
    public function index()
    {
        return $this->render('admin/admin/orders/index.html.twig');
    }

    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    public function dashboard()
    {
        return $this->render('admin/admin/orders/index.html.twig');
    }

}