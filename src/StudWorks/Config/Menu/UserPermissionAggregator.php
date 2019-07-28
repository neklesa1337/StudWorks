<?php

namespace App\StudWorks\Config\Menu;

use App\StudWorks\User\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class UserPermissionAggregator
 * @package App\StudWorks\Config\Menu
 */
class UserPermissionAggregator
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserPermissionAggregator constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        TokenStorageInterface $tokenStorage
    )
    {
        $token = $tokenStorage->getToken();
        if ($token) {
            $this->user = $token->getUser() instanceof User ? $token->getUser() : null;
        }
    }

    public function getAdminMenu(): array
    {
        if (!$this->user) {
            return [];
        }
        $items = [];

        if (in_array('ROLE_ADMIN', $this->user->getRoles())) {
            $items = array_merge($items, $this->getAdminMenuItems());
        }

        if (in_array('ROLE_MODER', $this->user->getRoles())) {
            $items = array_merge($items, $this->getModerMenuItems());
        }

        return $items;
    }

    private function getModerMenuItems(): array
    {
        return [
            [
                'label' => 'Orders Moderation',
                'link' => '/',
                'class' => 'fa fa-book'
            ]
        ];
    }

    /**
     * @return array
     */
    private function getAdminMenuItems(): array
    {
        return [
            [
                'label' => 'Orders Administration',
                'link' => '/',
                'class' => 'fa fa-book'
            ]
        ];
    }
}