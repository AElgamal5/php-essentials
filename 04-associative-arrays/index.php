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
    $books = ['The Country of the Blind', '1948', 'Utopia'];
    $books = [
        ['name' => 'The Country of the Blind', 'year' => 1911, 'read' => true],
        ['name' => '1948', 'year' => 1949, 'read' => false],
        ['name' => 'Utopia', 'year' => 2008, 'read' => true],
    ];
    ?>

    <ul>
        <?php foreach ($books as $book): ?>

            <li><?= $book['name'] ?></li>

        <?php endforeach ?>
    </ul>

    <p>My favorite book is: <?= $books[2]['name'] ?>, which published on <?= $books[2]['year'] ?></p>
</body>

</html>