<?php view('partials/head.php', ['heading' => $heading]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => $heading]) ?>

<main class="flex items-center justify-center mt-12">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">

        <?php if (isset($message)): ?>
            <p class="text-green-500 text-xs mb-2"><?= $message ?></p>
        <?php endif ?>

        <form action="/note" method="POST">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Note:</label>
                <textarea id="body" name="body" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter your Note"><?= $_POST['body'] ?? $note['body'] ?></textarea>
            </div>

            <?php if (isset($errors['body'])): ?>
                <p class="text-red-500 text-xs mb-2"><?= $errors['body'] ?></p>
            <?php endif ?>

            <div class="flex items-center">
                <a href="/notes"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Cancel</a>

                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>

        </form>
    </div>
</main>

<script>

</script>

<?php view('partials/foot.php') ?>