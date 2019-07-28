<?php


namespace App\StudWorks\Order\Entity;

use App\StudWorks\User\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="stud_order")
 */
class Order
{
    const STATUS_CREATED = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CHECK = 3;
    const STATUS_DONE = 4;
    const STATUS_APPROVE = 5;
    const STATUS_PROBLEM = 6;

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
     * @var string|null
     * @ORM\Column(type="string", name="file")
     */
    private $file;

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
     * Order constructor.
     */
    public function __construct()
    {
        $this->status = self::STATUS_CREATED;
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
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
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
}