<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
  <div>
    <a href="/notes" class="text-blue-600 text-xl font-semibold underline my-2">Go Back..</a>
    <h2 class="text-blue-600 text-xl"><?= $note['body'] ?> </h2>
    <div class="flex gap-6 my-2">

      <button>
        <a href="/note/edit?id=<?= $note['id']; ?>"> Edit </a>
      </button>

      <form action="/notes" method="post">
        <input type="hidden" hidden name="__method" value="DELETE">
        <input type="hidden" name="id" id="" value="<?= $note['id']; ?>">
        <button type="submit" class="text-red-600 cursor-pointer hover:underline">Delete</button>
      </form>
    </div>
  </div>
</main>

<?php require base_path("views/partials/footer.php");
