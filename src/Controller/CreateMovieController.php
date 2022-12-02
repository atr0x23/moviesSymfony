<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class CreateMovieController extends AbstractController
{
//    #[Route('/movie', name: 'app_add_movie')]
//    public function createMovie(ManagerRegistry $doctrine): Response {
//
//        $entityManager = $doctrine->getManager();
//
//        $movie = new Movie();
//        $movie->setTitle('Harry Potter');
//        $movie->setDescription('Of course it is happening inside your head, Harry, but why on earth should that mean that it is not real?');
//        $movie->setUserId('1');
//
//        $entityManager->persist($movie);
//        $entityManager->flush();
//
//        return new Response('New movie added with id' . $movie->getUserId());
//      //  return $this->render('create_movie/index.html.twig', ['controller_name' => 'New movie add with id:', 'id' => $movie->getUserId()]);
//    }

}
