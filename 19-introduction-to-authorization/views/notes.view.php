<?php require 'partials/head.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/header.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>Welcome to the notes h1age</h1>
        <br>
        <?php foreach ($notes as $note): ?>

            <li>
                <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline mx-1">
                    <?= $note['body'] ?>
                </a>
            </li>

        <?php endforeach ?>
    </div>
</main>

<?php require 'partials/foot.php' ?>