<?php view('partials/head.php', ['heading' => $heading]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => $heading]) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Back</a>
        </p>
        <br>
        <p class="text-xl inline-block  border border-zinc-500 rounded px-4 py-2 mb-4">
            <?= htmlspecialchars($note['body']) ?? "No note with this data" ?>
        </p>
        <br>
        <form method="POST">
            <input type="hidden" value="DELETE" name="_method">
            <input type="hidden" value="<?= $note['id'] ?>" name="id">
            <a href="/note/edit?id=<?= $note['id'] ?>"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Edit</a>
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Delete</button>
        </form>
    </div>
</main>

<?php view('partials/foot.php') ?>