<?php

namespace App\Domain\Entities;

class Inventory
{
    /**
     * @var Product[]
     */
    private array $products = [];

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}