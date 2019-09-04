<?php

namespace App\StudWorks\Order\Dto;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class NewOrderDto
 * @package App\StudWorks\Order\Dto
 */
class NewOrderDto
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var UploadedFile[]
     */
    private $orderFiles;

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return UploadedFile[]
     */
    public function getOrderFiles(): array
    {
        return $this->orderFiles ?? [];
    }

    /**
     * @param UploadedFile[] $orderFiles
     */
    public function setOrderFiles(array $orderFiles): void
    {
        $this->orderFiles = $orderFiles;
    }
}
