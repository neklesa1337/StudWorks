<?php

namespace App\StudWorks\Order\Logs\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="stud_order_log")
 */
class OrderLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", name="description")
     */
    private $description;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", name="created")
     */
    private $created;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\StudWorks\User\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Order
     * @ORM\ManyToOne(targetEntity="App\StudWorks\Order\Entity\Order")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
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
     * @return \DateTimeInterface
     */
    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created): void
    {
        $this->created = $created;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }
}