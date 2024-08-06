<?php

namespace App\Infrastructure\Adapters\Presenters;

use App\Application\Ports\ProductPresenterInterface;

class ArrayProductPresenter implements ProductPresenterInterface
{
    public function present(array $products): array
    {
        return array_map(
            fn($product) => $product->asArray(),
            $products
        );
    }
}