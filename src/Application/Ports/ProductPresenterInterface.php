<?php

namespace App\Application\Ports;

use App\Application\DTOs\ProductDTO;

interface ProductPresenterInterface
{
    /**
     * @param ProductDTO[] $products
     * @return array
     */
    public function present(array $products): array;
}