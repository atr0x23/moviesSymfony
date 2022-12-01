<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/', name:'app_index')]
    public function homepage(MovieRepository $movieRepository):Response {

        $movies = $movieRepository->findAll();

        return $this->render('list/movies.html.twig', ['movies' => $movies]);

    }

}