<?php

namespace App\StudWorks\Config\Twig\Provider;

use App\StudWorks\Config\Menu\UserPermissionAggregator;

class GlobalVariablesProvider
{
    /**
     * @var UserPermissionAggregator
     */
    private $menuAggregator;

    public function __construct(
        UserPermissionAggregator $menuAggregator
    )
    {
        $this->menuAggregator = $menuAggregator;
    }

    /**
     * @return array
     */
    public function getAdminMenu(): array
    {
        return $this->menuAggregator->getAdminMenu();
    }
}