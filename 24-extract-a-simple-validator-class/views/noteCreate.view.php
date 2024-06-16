<?php require 'partials/head.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/header.php' ?>

<main class="flex items-center justify-center mt-12">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Note:</label>
                <textarea id="body" name="body" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter your Note"><?= $_POST['body'] ?? '' ?></textarea>
            </div>

            <?php if (isset($errors['body'])): ?>
                <p class="text-red-500 text-xs mb-2"><?= $errors['body'] ?></p>
            <?php endif ?>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php require 'partials/foot.php' ?>