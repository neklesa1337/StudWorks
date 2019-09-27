<?php

namespace App\StudWorks\Files\Entity;

use App\StudWorks\Order\Entity\Order;
use App\StudWorks\User\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\StudWorks\Files\Repository\OrderFileRepository")
 */
class OrderFile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $path;

    /**
     * @ORM\Column(type="integer")
     */
    private $status = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\StudWorks\User\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\StudWorks\Order\Entity\Order", inversedBy="customerFiles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $studOrder;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCustomerFile;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="updated")
     */
    private $updated;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="created")
     */
    private $created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStudOrder(): ?Order
    {
        return $this->studOrder;
    }

    public function setStudOrder(?Order $studOrder): self
    {
        $this->studOrder = $studOrder;

        return $this;
    }

    public function isCustomerFile(): ?bool
    {
        return $this->isCustomerFile;
    }

    public function setIsCustomerFile(bool $isCustomerFile): self
    {
        $this->isCustomerFile = $isCustomerFile;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated(\DateTime $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return string|null
     */
    public function getFileFullPath(): ?string
    {
        return realpath(__DIR__ . '/../../../../' . $this->path) ?? null;
    }
}
