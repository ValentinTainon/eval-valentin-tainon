<?php

namespace App\Controller;

use App\Repository\ComputerListByUserRepository;
use App\Repository\ComputerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    #[IsGranted('ROLE_USER')]
    public function index(ComputerRepository $computerRepository, ComputerListByUserRepository $computerListByUserRepository): Response
    {
        $auteur = $this->getUser();

        return $this->render('profil/index.html.twig', [
            'computers' => $computerRepository->findBy([
                'auteur' => $auteur
            ]),
            'computersFav' => $computerListByUserRepository->findBy([
                'users' => $auteur
            ]),
        ]);
    }
}
