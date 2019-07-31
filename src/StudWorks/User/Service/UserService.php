<?php


namespace App\StudWorks\User\Service;


use App\StudWorks\User\Entity\User;
use App\StudWorks\User\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $status
     * @return User[]
     */
    public function getUsersByStatus(string $status): array
    {
        return $this->userRepository->findUsersByStatus($status);
    }

    /**
     * @param int $userId
     * @return User
     */
    public function getUserById(int $userId): User
    {
        return $this->userRepository->find($userId);
    }
}
