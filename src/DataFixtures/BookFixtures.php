<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $books = [
            [
                'isbn' => '2-221-02602-0',
                'author' => 'Frank Herbert',
                'title' => 'Dune',
                'thumbnail' => 'dune.jpg'
            ],
            [
                'isbn' => '1-905328-14-1',
                'author' => 'Bram Stoker',
                'title' => 'Dracula',
                'thumbnail' => 'dracula.jpg',
            ],
            [
                'isbn' => '978-2290330586',
                'author' => 'Glen Cook',
                'title' => 'La Compagnie noire, Tome 1',
                'thumbnail' => 'compagnienoire_tome1.jpg',
            ]
        ];

        foreach ($books as $item) {
            $book = new Book();
            $book->setAuthor($item['author']);
            $book->setTitle($item['title']);
            $book->setIsbn($item['isbn']);
            $book->setThumbnail($item['thumbnail']);
            $manager->persist($book);
        }

        $manager->flush();
    }
}
