<?php

namespace App\Domain\Entities;

class WeightedProduct extends Product
{
    public function __construct(
        string $id,
        string $name,
        float $price,
        string $unit,
        float $stock
    )
    {
        parent::__construct($id, $name, $price, $unit, true, $stock);
    }

    public function getPrice(): float
    {
        if ($this->stock > 10) {
            return $this->price * 0.9;
        }

        return $this->price;
    }
}