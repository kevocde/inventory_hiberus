<?php

namespace App\Infrastructure\Controller;

use App\Application\UseCases\ListProductsUseCase;
use App\Infrastructure\Adapters\DoctrineProductRepository;
use App\Infrastructure\Adapters\Presenters\ArrayProductPresenter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $userCase = new ListProductsUseCase(
            new DoctrineProductRepository($entityManager), 
            new ArrayProductPresenter()
        );

        return $this->json($userCase->execute());
    }
}