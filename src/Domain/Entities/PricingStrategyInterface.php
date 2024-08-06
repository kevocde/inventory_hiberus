<?php

namespace App\Domain\Entities;

interface PricingStrategyInterface
{
    public function calculatePrice(Product $product): float;
}