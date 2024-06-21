<?php view('partials/head.php', ['heading' => $heading]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => $heading]) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p><a href="/notes" class="text-blue-500 hover:underline">Back..</a></p>
        <br>
        <p><?= htmlspecialchars($note['body']) ?? "No note with this data" ?></p>
        <br>
        <form method="POST">
            <input type="hidden" value="DELETE" name="_method">
            <input type="hidden" value="<?= $note['id'] ?>" name="id">
            <button type="submit" class="text-red-500 hover:underline">Delete</button>
        </form>
    </div>
</main>

<?php view('partials/foot.php') ?>