<?php

namespace App\StudWorks\Order\Logs\Service;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Logs\Dto\OrderLogDto;
use App\StudWorks\Order\Logs\Repository\OrderLogRepository;
use App\StudWorks\User\Entity\User;

/**
 * Class OrderLogService
 * @package App\StudWorks\Order\Logs\Service
 */
class OrderLogService
{
    /**
     * @var OrderLogRepository
     */
    private $logRepository;

    /**
     * OrderLogService constructor.
     * @param OrderLogRepository $logRepository
     */
    public function __construct(
        OrderLogRepository $logRepository
    )
    {
        $this->logRepository = $logRepository;
    }

    public function pushLog(OrderLogDto $dto)
    {

    }
}