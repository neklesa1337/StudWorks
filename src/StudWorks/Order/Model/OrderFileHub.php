<?php

namespace App\StudWorks\Order\Model;

use App\StudWorks\Files\Entity\OrderFile;

/**
 * Class OrderFileHub
 * @package App\StudWorks\Order\Model
 */
class OrderFileHub
{
    /**
     * @var OrderFile[]
     */
    private $customerFiles = [];

    /**
     * @var OrderFile[]
     */
    private $resultFiles = [];

    /**
     * OrderFileHub constructor.
     * @param OrderFile[] $files
     */
    public function __construct(array $files)
    {
        foreach ($files as $file) {
            if ($file->isCustomerFile()) {
                $this->customerFiles[] = $file;
            } else {
                $this->resultFiles[] = $file;
            }
        }
    }

    /**
     * @return OrderFile[]
     */
    public function getCustomerFiles(): array
    {
        return $this->customerFiles;
    }

    /**
     * @return OrderFile[]
     */
    public function getResultFiles(): array
    {
        return $this->resultFiles;
    }
}
