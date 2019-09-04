<?php

namespace App\StudWorks\Order\Dto;

/**
 * Class OrderDto
 * @package App\StudWorks\Order\Dto
 */
class OrderDto
{
    /**
     * @var array
     */
    private $data;

    /**
     * OrderDto constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->data['description'];
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return (int) $this->data['status'];
    }

    /**
     * @return int|null
     */
    public function getPerformerId(): ?int
    {
        return $this->data['performerId'] ? (int) $this->data['performerId'] : null;
    }
}
