<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
  <form method="post" action="/notes">
    <input type="hidden" name="__method" value="PATCH">
    <input type="hidden" name="id" value="<?= $note['id']; ?>">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">


        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


          <div class="col-span-full">
            <label for="body" class="block text-sm/6 font-medium text-gray-900">Note</label>
            <div class="mt-2">
              <textarea
                name="body"
                id="body"
                rows="3"

                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= $note['body']; ?></textarea>
            </div>
            <?php if (!empty($errors['body'])) : ?>
              <p class="text-red-400 text-sm "><?= $errors['body'] ?></p>
            <?php endif; ?>

          </div>




        </div>
      </div>




    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/notes">

        <button type="button" class="text-sm/6 font-semibold text-gray-900 cursor-pointer">Cancel</button>
      </a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">Save</button>
    </div>
  </form>

</main>

<?php require base_path("views/partials/footer.php");
