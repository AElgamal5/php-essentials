<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Recommended books</h1>
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
    })

        ?>

    <ul>
        <?php foreach ($books as $book): ?>

            <li><?= $book['name'] ?></li>

        <?php endforeach ?>
    </ul>

    <h3>Read books</h3>

    <ul>
        <?php foreach ($books as $book): ?>

            <?php if ($book['read']): ?>

                <li><?= $book['name'] ?></li>

            <?php endif ?>

        <?php endforeach ?>
    </ul>

    <p>My favorite book is: <?= $books[2]['name'] ?>, which published on <?= $books[2]['year'] ?></p>

    <h3>Books after 1930</h3>

    <ul>
        <?php foreach ($filterByYear($books, 1930) as $book): ?>
            <li><?= $book['name'] . ' - ' . $book['year']; ?></li>
        <?php endforeach ?>
    </ul>

    <h3>Filtered Books</h3>

    <ul>
        <?php foreach ($filteredBooks as $book): ?>
            <li><?= $book['name'] . ' - ' . $book['year']; ?></li>
        <?php endforeach ?>
    </ul>

    <h3>Filtered Books using array_filter</h3>

    <ul>
        <?php foreach ($filteredBooks2 as $book): ?>
            <li><?= $book['name'] . ' - ' . $book['year']; ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>