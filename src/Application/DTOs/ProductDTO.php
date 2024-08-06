<?php

namespace App\Application\DTOs;

class ProductDTO
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

    public function asArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'unit' => $this->unit,
            'weighted' => $this->weighted,
        ];
    }
}