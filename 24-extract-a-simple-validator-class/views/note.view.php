<?php require 'partials/head.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/header.php' ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><a href="/notes" class="text-blue-500 hover:underline mx-1">Back..</a></p>
        <br>
        <p><?= htmlspecialchars($note['body']) ?? "No note with this data" ?></p>
    </div>
</main>

<?php require 'partials/foot.php' ?>