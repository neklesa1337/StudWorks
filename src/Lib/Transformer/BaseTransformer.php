<?php

namespace App\Lib\Transformer;

/**
 * Class BaseTransformer
 * @package App\Lib\Transformer
 */
abstract class BaseTransformer
{
    /**
     * @param $item
     * @return array
     */
    abstract public function transformOne($item): array;

    /**
     * @param array $items
     * @return array
     */
    public function transformMany(array $items): array
    {
        return  array_map(function ($item) {
            return $this->transformOne($item);
        },$items);
    }
}
