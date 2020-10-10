<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TripRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=TripRepository::class)
 * @ApiResource()
 */
class Trip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ApiProperty(identifier=false)
     */
    private int $id;

    /**
     * @ApiProperty(identifier=true)
     * @ORM\Column(type="uuid", unique=true)
     */
    public UuidInterface $code;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $beginDate;

    /**
     * @ORM\Column(type="integer")
     */
    private int $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private int $distance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $comment;

    /**
     * @ORM\ManyToOne(targetEntity=TripType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private TripType $type;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="trips")
     * @ORM\JoinColumn(nullable=false)
     */
    private User $user;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $averageSpeed;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $averagePace;

    public function __construct()
    {
        $this->code = Uuid::uuid4();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginDate(): ?\DateTime
    {
        return $this->beginDate;
    }

    public function setBeginDate(\DateTime $beginDate): self
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getType(): ?TripType
    {
        return $this->type;
    }

    public function setType(TripType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAverageSpeed(): ?float
    {
        return $this->averageSpeed;
    }

    public function setAverageSpeed(?float $averageSpeed): self
    {
        $this->averageSpeed = $averageSpeed;

        return $this;
    }

    public function getAveragePace(): ?string
    {
        return $this->averagePace;
    }

    public function setAveragePace(?string $averagePace): self
    {
        $this->averagePace = $averagePace;

        return $this;
    }

    public function getCode(): UuidInterface
    {
        return $this->code;
    }

    public function setCode(UuidInterface $code): self
    {
        $this->code = $code;

        return $this;
    }
}
