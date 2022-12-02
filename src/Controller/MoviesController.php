<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\CreateMovieFormType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository, EntityManagerInterface $em)
    {
        $this->movieRepository = $movieRepository;
        $this->em = $em;
    }

    #[Route('/', name:'app_index')]
    public function homepage(MovieRepository $movieRepository, EntityManagerInterface $em):Response {

        $movies = $movieRepository->findAll();

        return $this->render('list/movies.html.twig', ['movies' => $movies]);

    }

    #[Route('/bydate', name:'app_bydate')]
    public function bydate(MovieRepository $movieRepository):Response {

        $movies = $movieRepository->findBy([],['createdAt' => 'DESC']);
        return $this->render('list/movies.html.twig', ['movies' => $movies]);

    }

    #[Route('/create/movie', name: 'app_create_movie')]
    public function createMovie(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(CreateMovieFormType::class, $movie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $newMovie = $form->getData();

            $this->em->persist($newMovie);
            $this->em->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('create_movie/index.html.twig', ['form' => $form->createView()]);
    }

}
