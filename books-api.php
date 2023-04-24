<?php
use IntrepidGroup\SampleApplication\Repository\StaticBookRepository;

require_once __DIR__.'/vendor/autoload.php';

// Fetch the collection of books
$bookRepository = new StaticBookRepository();
$books = $bookRepository->fetchAll();

echo json_encode($books);
