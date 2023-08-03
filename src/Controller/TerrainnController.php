<?php

namespace App\Controller;

use App\Entity\Terrain;
use App\Repository\TerrainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TerrainnController extends AbstractController
{
    #[Route('/terrainn', name: 'app_terrainn')]

    public function index(TerrainRepository $terrainRepository): Response

    {
        return $this->render('terrainn/index.html.twig', [
            'terrains' => $terrainRepository->findAll(),
        ]);
    }


}
