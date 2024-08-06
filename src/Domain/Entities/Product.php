<?php

namespace App\Domain\Entities;

class Product
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected float $price,
        protected string $unit,
        protected bool $weighted
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getWeighted(): bool
    {
        return $this->weighted;
    }

}