<?php

namespace App\StudWorks\User\Transformer;

use App\StudWorks\User\Entity\User;

/**
 * Class UserTransformer
 * @package App\StudWorks\User\Transformer
 */
class UserTransformer
{
    /**
     * @param User $user
     * @return array
     */
    public function transformOne(User $user): array
    {
        return [
            'id' => $user->getId(),
            'roles' => $user->getRoles(),
            'userName' => $user->getUsername()
        ];
    }

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
