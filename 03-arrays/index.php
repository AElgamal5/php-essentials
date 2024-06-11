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
    ?>

    <ul>
        <?php
        foreach ($books as $book) {
            echo "<li>{$book}🕮</li>";
        }
        ?>
    </ul>

    <h3>Anther way to loop over array</h3>

    <ul>
        <?php foreach ($books as $book): ?>
            <li><?= $book ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>