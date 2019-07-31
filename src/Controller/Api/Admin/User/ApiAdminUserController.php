<?php

namespace App\Controller\Api\Admin\User;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Service\OrderService;
use App\StudWorks\Order\Transformer\OrderTransformer;
use App\StudWorks\User\Model\Role;
use App\StudWorks\User\Service\UserService;
use App\StudWorks\User\Transformer\UserTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/admin/users")
 */
class ApiAdminUserController extends AbstractController
{
    /**
     * @Route("/performer", name="api_admin_user_performers")
     * @param UserService $userService
     * @param UserTransformer $transformer
     * @return Response
     */
    public function usersByRole(
        UserService $userService,
        UserTransformer $transformer
    ): Response
    {
        return $this->json($transformer->transformMany(
            $userService->getUsersByStatus(Role::PERFORMER)
        ));
    }
}
