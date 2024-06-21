<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><a href="/notes" class="text-blue-500 hover:underline mx-1">Back..</a></p>
        <br>
        <p><?= htmlspecialchars($note['body']) ?? "No note with this data" ?></p>
    </div>
</main>

<?php view('partials/foot.php') ?>