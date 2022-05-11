<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
class Feedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $text;

    #[ORM\Column(type: 'datetime')]
    private $dateAndTime;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'feedbacks')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDateAndTime(): ?\DateTimeInterface
    {
        return $this->dateAndTime;
    }

    public function setDateAndTime(\DateTimeInterface $dateAndTime): self
    {
        $this->dateAndTime = $dateAndTime;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
