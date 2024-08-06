<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Entities\Product as EntitiesProduct;
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
            fn($product) => new EntitiesProduct(
                $product->getId(), 
                $product->getName(), 
                $product->getPrice(), 
                $product->getUnit(), 
                $product->getWeighted()
            ),
            $products
        );

        return $products;
    }
}