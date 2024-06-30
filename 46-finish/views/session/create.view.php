<?php view('partials/head.php', ['heading' => $heading]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/header.php', ['heading' => $heading]) ?>

<main class="flex items-center justify-center mt-12">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">

        <?php foreach ($errors['credentials'] ?? [] as $error): ?>
            <p class="text-red-500 text-xs mb-2"><?= $error ?></p>
        <?php endforeach ?>

        <form action="/session" method="POST">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="text" name="email" id="email" required class="w-full px-1 py-1 border-2 rounded mb-2"
                    value="<?= old('email') ?>">
                <?php foreach ($errors['email'] ?? [] as $error): ?>
                    <p class="text-red-500 text-xs mb-2"><?= $error ?></p>
                <?php endforeach ?>
            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-1 py-1 border-2 rounded mb-2">
                <?php foreach ($errors['password'] ?? [] as $error): ?>
                    <p class="text-red-500 text-xs mb-2"><?= $error ?></p>
                <?php endforeach ?>
            </div>


            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
            </div>
        </form>
    </div>
</main>

<?php view('partials/foot.php') ?>