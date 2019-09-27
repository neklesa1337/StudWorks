<?php

namespace App\Controller\Admin\Corrector;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/corrector")
 */
class CorrectorPageController extends AbstractController
{
    /**
     * @Route("/orders", name="corrector_orders")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/corrector/orders/index.html.twig');
    }
}
