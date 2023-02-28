<?php

namespace App\Controller;

use App\Repository\PostRepository;
use FOS\ElasticaBundle\Finder\FinderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DefaultController extends AbstractController
{

    public function __construct(private readonly FinderInterface $finder)
    {
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    #[Route('/elastic-search/{term}', name: 'elastic_search')]
    public function elasticSearch(string $term): JsonResponse
    {
        $result = $this->finder->find($term);
        return $this->json($result);
    }

    #[Route('/simple-search/{term}', name: 'simple_search')]
    public function simpleSearch(string $term, PostRepository $postRepository): JsonResponse
    {
        $result = $postRepository->search($term);
        return $this->json($result);
    }
}
