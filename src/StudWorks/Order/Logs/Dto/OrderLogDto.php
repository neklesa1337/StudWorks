<?php

namespace App\StudWorks\Order\Logs\Dto;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;

class OrderLogDto
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var string
     */
    private $description;

    public function __construct(
        User $user,
        Order $order,
        string  $description
    )
    {
        $this->user = $user;
        $this->order = $order;
        $this->description = $description;
    }
}