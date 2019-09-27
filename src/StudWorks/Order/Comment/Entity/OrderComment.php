<?php


namespace App\StudWorks\Order\Comment\Entity;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_comment")
 */
class OrderComment
{
    const FROM_MODERATION = 1;
    const FROM_CORRECTION = 2;

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
     * @var bool
     * @ORM\Column(type="boolean", name="is_admin")
     */
    private $isAdmin = true;

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

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }
}
