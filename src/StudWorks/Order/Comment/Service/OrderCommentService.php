<?php

namespace App\StudWorks\Order\Comment\Service;

use App\StudWorks\Order\Comment\Entity\OrderComment;
use App\StudWorks\Order\Comment\Repository\OrderCommentRepository;
use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;

/**
 * Class OrderCommentService
 * @package App\StudWorks\Order\Comment\Service
 */
class OrderCommentService
{
    /**
     * @var OrderCommentRepository
     */
    private $commentRepository;

    /**
     * OrderCommentService constructor.
     * @param OrderCommentRepository $commentRepository
     */
    public function __construct(
        OrderCommentRepository $commentRepository
    )
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param Order $order
     * @param User $user
     * @param string $commentVal
     * @param int $status
     * @return OrderComment
     * @throws \Doctrine\ORM\ORMException
     */
    public function createComment(
        Order $order,
        User $user,
        string $commentVal,
        int $status
    ): OrderComment
    {
        $comment = new OrderComment();
        $comment->setUser($user);
        $comment->setOrder($order);
        $comment->setDescription($commentVal);
        $this->commentRepository->getEM()->persist($comment);
        return $comment;
    }
}
