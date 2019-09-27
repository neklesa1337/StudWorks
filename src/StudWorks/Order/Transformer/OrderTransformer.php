<?php

namespace App\StudWorks\Order\Transformer;

use App\StudWorks\Files\Transformer\OrderFileTransformer;
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
     * @var OrderFileTransformer
     */
    private $orderFileTransformer;

    /**
     * OrderTransformer constructor.
     * @param OrderLogTransformer $logTransformer
     * @param OrderFileTransformer $orderFileTransformer
     */
    public function __construct(
        OrderLogTransformer $logTransformer,
        OrderFileTransformer $orderFileTransformer
    )
    {
        $this->logTransformer = $logTransformer;
        $this->orderFileTransformer = $orderFileTransformer;
    }

    /**
     * @param Order $order
     * @param bool $detailTransform
     * @return array
     */
    public function transformOne(Order $order, bool $detailTransform = false): array
    {
        $filesHub = $order->getFilesHub();
        $data = [
            'id' => $order->getId(),
            'description' => $order->getDescription(),
            'createAt' => $order->getCreated(),
            'updateAt' => $order->getUpdated(),
            'status' => $order->getStatus(),
            'customerFiles' => $this->orderFileTransformer->transformMany(
                $filesHub->getCustomerFiles()
            ),
            'resultFiles' => $this->orderFileTransformer->transformMany(
                $filesHub->getCustomerFiles()
            ),
        ];

        if ($detailTransform) {
            $data['logs'] = $this->logTransformer->transformMany(
                $order->getLogs()
            );
            $data['performerId'] = $order->getPerformer() ? $order->getPerformer()->getId() : null;
            $data['performerName'] = $order->getPerformer() ? $order->getPerformer()->getUsername() : null;
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
        return  array_map(function (Order $order) use ($detailTransform) {
            return $this->transformOne($order, $detailTransform);
        },$items);
    }
}
