<?php

namespace App\Controller;

use App\Repository\RegionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(RegionRepository $regionRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'regions' => $regionRepository->findAll()
        ]);
    }


    #[Route('/{id}', name: 'app_single')]
    public function displayRegion(RegionRepository $regionRepository, $id): Response
    {
        return $this->render('main/single.html.twig', [
            'region' => $regionRepository->find($id)
        ]);
    }
}

