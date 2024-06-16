<?php require 'partials/head.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/header.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>Welcome to the notes page</h1>
        <br>
        <p>
            <a href="/notes/create" class="text-green-600 hover:underline">Create A Note</a>
        </p>
        <br>
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline mx-1">
                        <?= $note['body'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php require 'partials/foot.php' ?>