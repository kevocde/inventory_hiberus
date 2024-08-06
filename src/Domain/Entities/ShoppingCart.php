<?php

namespace App\Domain\Entities;

class ShoppingCart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function addItem(CartItem $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->calculatePrice($item->getProduct());
        }

        return $total;
    }
}