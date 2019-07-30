<?php

namespace App\StudWorks\Order\Logs\Transformer;

use App\StudWorks\Order\Logs\Entity\OrderLog;

/**
 * Class OrderLogsTransformer
 * @package App\StudWorks\Order\Logs\Transformer
 */
class OrderLogTransformer
{
    /**
     * @param OrderLog $log
     * @return array
     */
    public function transformOne(OrderLog $log): array
    {
        return [
            'id'          => $log->getId(),
            'description' => $log->getDescription(),
            'createAt'    => $log->getCreated(),
            'userId'      => $log->getUser()->getId(),
            'userName'    => $log->getUser()->getUsername()
        ];
    }

    /**
     * @param array $items
     * @return array
     */
    public function transformMany(array $items): array
    {
        return array_map(function ($item) {
            return $this->transformOne($item);
        }, $items);
    }
}