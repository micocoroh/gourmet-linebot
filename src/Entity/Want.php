<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WantRepository")
 */
class Want
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $about_price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $purchase_status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAboutPrice(): ?int
    {
        return $this->about_price;
    }

    public function setAboutPrice(?int $about_price): self
    {
        $this->about_price = $about_price;

        return $this;
    }

    public function getPurchaseStatus(): ?bool
    {
        return $this->purchase_status;
    }

    public function setPurchaseStatus(bool $purchase_status): self
    {
        $this->purchase_status = $purchase_status;

        return $this;
    }
}
