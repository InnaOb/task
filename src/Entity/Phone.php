<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class,inversedBy: 'phone')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 3)]
    private ?int $country_code = null;

    #[ORM\Column(length: 2)]
    private ?int $operator_code = null;

    #[ORM\Column(length: 7)]
    private ?int $number = null;

    #[ORM\Column]
    private ?int $balance = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCountryCode(): ?int
    {
        return $this->country_code;
    }

    public function setCountryCode(int $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getOperatorCode(): ?int
    {
        return $this->operator_code;
    }

    public function setOperatorCode(int $operator_code): self
    {
        $this->operator_code = $operator_code;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return string
     */
    public function formatNumber(): string
    {
        return $this->getCountryCode() . $this->getOperatorCode() . $this->getNumber();
    }
}
