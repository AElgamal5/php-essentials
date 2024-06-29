<?php view('partials/head.php', ['heading' => $heading]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes/create"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                Create A Note
            </a>
        </p>
        <br>
        <ul class="list-disc">
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline mx-1">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php view('partials/foot.php') ?>