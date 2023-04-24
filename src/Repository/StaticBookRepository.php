<?php

namespace IntrepidGroup\SampleApplication\Repository;

use IntrepidGroup\SampleApplication\Entity\Book;

/**
 * Class StaticBookRepository.
 *
 * This class returns acts as a Book Repository for a statically defined list of books
 */
class StaticBookRepository implements BookRepositoryInterface
{
    private $books = [];

    public function __construct()
    {
        $this->preloadStaticBooks();
        $this->removeNonEnglish();
        $this->sortByYear();
    }

    /**
     * Retrieve and return a collection of all books.
     *
     * @return Book[]
     */
    public function fetchAll()
    {
        $output = [];

        /* @var $book Book */
        foreach ($this->books as $book) {
            $output[] = $book->toArray();
        }

        return $output;
    }

    /**
     * Preload the static list of books.
     */
    private function preloadStaticBooks()
    {
        $this->books[] = new Book('Finnegans Wake', 'Janes Joyce', 'English', 1941, 3, 'Fiction');
        $this->books[] = new Book('Don Quixote', 'Miguel De Cervantes', 'Spanish', 1615, 5, 'History');
        $this->books[] = new Book('The Making of Americans', 'Gertrude Stein', 'English', 1925, 5, 'Non-Fiction');
        $this->books[] = new Book('Finnegans Wake', 'Janes Joyce', 'English', 1941, 3, 'Fiction');
        $this->books[] = new Book('Don Quixote', 'Miguel De Cervantes', 'Spanish', 1615, 5, 'Adventure');
        $this->books[] = new Book('The Making of Americans', 'Gertrude Stein', 'English', 1925, 5, 'Fiction');
        $this->books[] = new Book('The Stranger', 'Albert Camus', 'French', 1942, 4, 'Philosophy');
        $this->books[] = new Book('Pilgrims Progress', 'John Bunyan', 'English', 1684, 4, 'Religion');
        $this->books[] = new Book('In Search of Lost Time', 'Marcel Proust', 'French', 1913, 1, 'Fiction');
        $this->books[] = new Book('Pale Fire', 'Valdimir Nabokov', 'English', 1962, 4, 'Poetry');
        $this->books[] = new Book('The Trial', 'Franz Kafka', 'German', 1925, 2, 'Fiction');
        $this->books[] = new Book('Ulysses', 'James Joyce', 'English', 1922, 3, 'Fiction');
        $this->books[] = new Book('The Name of the Rose', 'Umberto Eco', 'Italian', 1980, 4, 'Mystery');
        $this->books[] = new Book('The Gulag Archipelago', 'Aleksandr Solzhenitsyn', 'Russian', 1973, 4, 'History');
        $this->books[] = new Book('The Diary of a Young Girl', 'Anne Frank', 'Dutch', 1947, 2, 'Autobiography');
        $this->books[] = new Book('Gravity\'s Rainbow', 'Thomas Pynchon', 'English', 1973, 2, 'Science Fiction');
        $this->books[] = new Book('One Hundred Years of Solitude', 'Gabriel García Márquez', 'Spanish', 1967, 5, 'Realism');
        $this->books[] = new Book('The Sound and the Fury', 'William Faulkner', 'English', 1929, 3, 'Fiction');
        $this->books[] = new Book('Confusion of Feelings', 'Stefan Zweig', 'German', 1927, 3, 'Psychology');
        $this->books[] = new Book('The Public Burning', 'Robert Coover', 'English', 1977, 1, 'Satire');
        $this->books[] = new Book('The Joke', 'Milan Kundera', 'Czech', 1967, 5,'Comedy');
     
        
    } 

    // filter out non-English books
    private function removeNonEnglish(): void
    {
       $this->books = array_filter($this->books, function ($book) {
        return $book->getLanguage() === 'English';
        });
    }
    private function sortByYear(): void
    {
        usort($this->books, function($a, $b) {
            return $b->getYear() - $a->getYear();
        });
    }
}
