<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
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
}
