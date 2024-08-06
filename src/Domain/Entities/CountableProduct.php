<?php

namespace App\Domain\Entities;

class CountableProduct extends Product
{
    public function __construct(
        string $id,
        string $name,
        float $price,
        string $unit,
        float $stock
    )
    {
        parent::__construct($id, $name, $price, $unit, false, $stock);
    }
}