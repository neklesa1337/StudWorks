<?php


namespace App\StudWorks\Order\Entity;

use App\StudWorks\Files\Entity\OrderFile;
use App\StudWorks\Order\Logs\Entity\OrderLog;
use App\StudWorks\User\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="stud_order")
 */
class Order
{
    const STATUS_CREATED = 1;
    const STATUS_FIRST_PAYMENT_DONE = 2;
    const STATUS_MODERATED = 3;
    const STATUS_NOT_MODERATED = 4;
    const STATUS_IN_PROGRESS = 5;
    const STATUS_ON_CHECK = 6;
    const STATUS_WORK_DONE = 7;
    const STATUS_SECOND_PAYMENT_DONE = 8;
    const STATUS_CLIENT_PROBLEM = 9;
    const STATUS_APPROVE = 10;
    const STATUS_PROBLEM = 11;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var string
     * @ORM\Column(type="string", name="description")
     */
    private $description;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", name="updated")
     */
    private $updated;

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
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="App\StudWorks\Order\Logs\Entity\OrderLog", mappedBy="order")
     */
    private $logs;

    /**
     * @var ?User
     * @ORM\ManyToOne(targetEntity="App\StudWorks\User\Entity\User")
     * @ORM\JoinColumn(name="performer_id", referencedColumnName="id")
     */
    private $performer;

    /**
     * @ORM\OneToMany(targetEntity="App\StudWorks\Files\Entity\OrderFile", mappedBy="studOrder")
     */
    private $customerFiles;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->status = self::STATUS_CREATED;
        $this->customerFiles = new ArrayCollection();
    }

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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
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
    public function getUpdated(): \DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * @param \DateTimeInterface $updated
     */
    public function setUpdated(\DateTimeInterface $updated): void
    {
        $this->updated = $updated;
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
     * @return OrderLog[]
     */
    public function getLogs(): array
    {
        return $this->logs ? $this->logs->toArray() : [];
    }

    /**
     * @return ?User
     */
    public function getPerformer(): ?User
    {
        return $this->performer;
    }

    /**
     * @param User $performer
     */
    public function setPerformer(User $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return Collection|OrderFile[]
     */
    public function getCustomerFiles(): Collection
    {
        return $this->customerFiles;
    }
}