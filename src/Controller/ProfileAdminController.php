<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileAdminController extends AbstractController
{
    #[Route('/profile/admin', name: 'app_profile_admin')]
    public function index(): Response
    { if (!$this->getUser()) {
        throw $this->createAccessDeniedException();
    }
        return $this->render('profile_admin/index.html.twig', [
            'controller_name' => 'ProfileAdminController',
        ]);
    }
}
