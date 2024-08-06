<?php

namespace App\Domain\Entities;

class CartItem implements PricingStrategyInterface
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function calculatePrice(Product $product): float
    {
        return $product->getPrice() * $this->quantity;
    }
}