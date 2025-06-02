<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
  <div>
    <ul>

      <?php foreach ($notes as $note) : ?>
        <li>

          <a href="/note?id=<?= $note['id'] ?>" class="text-blue-400 hover:underline">
            <p><?= htmlspecialchars($note['body']) ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <button class="text-white bg-blue-500 rounded-md p-3 my-5 cursor-pointer">
      <a href="/notes/create">Create Note</a>

    </button>
  </div>
</main>

<?php require base_path("views/partials/footer.php");
