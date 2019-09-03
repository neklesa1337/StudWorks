<?php

namespace App\StudWorks\Files\Transformer;

use App\StudWorks\Files\Entity\OrderFile;

/**
 * Class OrderFileTransformer
 * @package App\StudWorks\Files\Transformer
 */
class OrderFileTransformer
{
    /**
     * @param OrderFile $file
     * @return array
     */
    public function transformOne(OrderFile $file): array 
    {
        return [
            'id' => $file->getId(),
            'path' => $file->getPath(),
            'isCustomerFile' => $file->getIsCustomerFile(),
            'created' => $file->getCreated(),
            'updated' => $file->getUpdated(),
        ];
    }

    /**
     * @param array $ordersFiles
     * @return array
     */
    public function transformMany(array $ordersFiles): array
    {
        return array_map(function (OrderFile $file){
            return $this->transformOne($file);
        }, $ordersFiles);
    }
}
