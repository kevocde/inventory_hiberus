<?php

namespace App\Domain\Entities;

abstract class Product
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected float $price,
        protected string $unit,
        protected bool $weighted,
        protected float $stock
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

    public function getStock(): float
    {
        return $this->stock;
    }

    public function setStock(float $stock): void
    {
        $this->stock = $stock;
    }
}