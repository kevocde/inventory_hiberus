<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Entities\WeightedProduct as EntitiesWeightedProduct;
use App\Domain\Entities\CountableProduct as EntitiesCountableProduct;
use App\Infrastructure\Entity\Product;
use App\Domain\Ports\ProductRepositoryInterface;
use Doctrine\ORM\EntityManager;

class DoctrineProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        protected EntityManager $entityManager,
    )
    {
    }

    public function findAll(): array
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();
        $products = array_map(
            function (Product $product) {
                if ($product->isWeighted()) {
                    return new EntitiesWeightedProduct(
                        $product->getId(), 
                        $product->getName(), 
                        $product->getPrice(), 
                        $product->getUnit(), 
                        $product->getStock()
                    );
                }

                return new EntitiesCountableProduct(
                    $product->getId(), 
                    $product->getName(), 
                    $product->getPrice(), 
                    $product->getUnit(), 
                    $product->getStock()
                );
            },
            $products
        );

        return $products;
    }
}