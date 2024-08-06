<?php

namespace App\Application\UseCases;

use App\Application\Dtos\ProductDTO;
use App\Application\Ports\ProductPresenterInterface;
use App\Domain\Entities\Product;
use App\Domain\Ports\ProductRepositoryInterface;

class ListProductsUseCase
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
        protected ProductPresenterInterface $productPresenter
    )
    {
    }

    /**
     * Return an array of products as associative array
     *
     * @return array
     */
    public function execute(): array
    {
        /**
         * @var Product[]
         */
        $products = $this->productRepository->findAll();
        $productsDTOs = array_map(
            fn($product) => new ProductDTO(
                $product->getId(),
                $product->getName(),
                $product->getPrice(),
                $product->getUnit(),
                $product->getWeighted()
            ),
            $products
        );

        return $this->productPresenter->present($productsDTOs);
    }
}