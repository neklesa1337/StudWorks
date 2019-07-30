<?php

namespace App\StudWorks\Order\Transformer;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\Order\Logs\Transformer\OrderLogTransformer;

/**
 * Class OrderTransformer
 * @package App\StudWorks\Order\Transformer
 */
class OrderTransformer
{
    /**
     * @var OrderLogTransformer
     */
    private $logTransformer;

    /**
     * OrderTransformer constructor.
     * @param OrderLogTransformer $logTransformer
     */
    public function __construct(
        OrderLogTransformer $logTransformer
    )
    {
        $this->logTransformer = $logTransformer;
    }

    /**
     * @param Order $order
     * @param bool $detailTransform
     * @return array
     */
    public function transformOne(Order $order, bool $detailTransform = false): array
    {
        $data = [
            'id' => $order->getId(),
            'description' => $order->getDescription(),
            'createAt' => $order->getCreated(),
            'updateAt' => $order->getUpdated(),
            'status' => $order->getStatus()
        ];

        if ($detailTransform) {
            $data['logs'] = $this->logTransformer->transformMany(
                $order->getLogs()
            );
            $data['performerId'] = $order->getPerformer()->getId();
            $data['performerName'] = $order->getPerformer()->getUsername();
        }

        return $data;
    }

    /**
     * @param array $items
     * @param bool $detailTransform
     * @return array
     */
    public function transformMany(array $items, bool $detailTransform = false): array
    {
        return  array_map(function ($item) use ($detailTransform) {
            return $this->transformOne($item, $detailTransform);
        },$items);
    }
}