<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Entity\Book;

class BooksController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/api/books", name="list_books", methods={"GET", "OPTIONS"})
     */
    public function listBook(): JsonResponse
    {
        $books =  $this->getDoctrine()->getRepository(Book::class)->findAll();

        return $this->json(['books' => $books]);
    }
}
