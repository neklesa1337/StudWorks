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
        return  $this->data['description'];
    }
}
