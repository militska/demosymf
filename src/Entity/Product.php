<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $params = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $ins_user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ins_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getParams(): ?array
    {
        return $this->params;
    }

    public function setParams(?array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function getInsUserId(): ?int
    {
        return $this->ins_user_id;
    }

    public function setInsUserId(int $ins_user_id): self
    {
        $this->ins_user_id = $ins_user_id;

        return $this;
    }

    public function getInsDate(): ?\DateTimeInterface
    {
        return $this->ins_date;
    }

    public function setInsDate(\DateTimeInterface $ins_date): self
    {
        $this->ins_date = $ins_date;

        return $this;
    }
}
