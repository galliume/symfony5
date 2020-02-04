<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class BooksController extends AbstractController
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @Route("/api/books/{search?}", name="list_books", methods={"GET", "OPTIONS"})
     */
    public function books(Request $request): JsonResponse
    {
        $search = $request->query->get('search', false);

        if (false !== $search) {
            $books = $this->bookRepository->searchByTitle($search);
        } else {
            $books = $this->bookRepository->findAll();
        }

        return $this->json(['books' => $books]);
    }
}
