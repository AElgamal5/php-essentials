<?php

$books = [
    ['name' => 'The Country of the Blind', 'year' => 1911, 'read' => true],
    ['name' => '1948', 'year' => 1949, 'read' => false],
    ['name' => 'Utopia', 'year' => 2008, 'read' => true],
];

//Lambda function
$filterByYear = function (array $books, int $year): array {
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['year'] > $year) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
};


function oldFilter(array $items, string $key, string|int|bool $value): array
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($item[$key] == $value) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}

$filteredBooks = oldFilter($books, 'year', 2008);


function filter(array $items, callable $fn): array
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}

$filteredBooks = filter($books, function ($book) {
    return $book['year'] > 1930;
});

//the same but with using php built in function
$filteredBooks2 = array_filter($books, function ($book) {
    return $book['year'] > 1930;
});

require 'index.view.php';