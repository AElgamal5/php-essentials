<?php require 'partials/head.php' ?>

<?php require 'partials/nav.php' ?>

<?php require 'partials/header.php' ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>Hello <?= $_SESSION['user']['name'] ?? 'Guest' ?>, Welcome to the homepage</p>
  </div>
</main>

<?php require 'partials/foot.php' ?>