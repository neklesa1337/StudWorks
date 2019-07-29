<?php

namespace App\StudWorks\Order\Transformer;

use App\Lib\Transformer\BaseTransformer;
use App\StudWorks\Order\Entity\Order;

/**
 * Class OrderTransformer
 * @package App\StudWorks\Order\Transformer
 */
class OrderTransformer extends BaseTransformer
{
    /**
     * @param Order $item
     * @return array
     */
    public function transformOne($order): array
    {
        return [
            'id' => $order->getId(),
            'description' => $order->getDescription(),
            'createAt' => $order->getCreated(),
            'updateAt' => $order->getUpdated(),
            'status' => $order->getStatus()
        ];
    }
}