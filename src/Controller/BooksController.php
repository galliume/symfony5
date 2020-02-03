<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Book;

class BooksController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->json([
            'books' => [
                ['ISBN' => '2-221-02602-0', 'title' => 'Dune', 'author' => 'Franck Herbert'],
                ['ISBN' => '1-905328-14-1', 'title' => 'Dracula', 'author' => 'Bram Stoker'],
            ]
        ]);
    }

    /**
     * @Route("/books", name="list_books")
     */
    public function listBook(): JsonResponse
    {
        $books =  $this->getDoctrine()->getRepository(Book::class)->findAll();

        return $this->json(['books' => $books]);
    }
}
