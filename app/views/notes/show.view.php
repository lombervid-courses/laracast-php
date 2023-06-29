<?php $include('partials/head'); ?>
<?php $include('partials/nav'); ?>
<?php $include('partials/banner'); ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
    </p>

    <p><?= htmlspecialchars($note->body) ?></p>

    <footer class="mt-6">
      <a href="/note/edit?id=<?= $note->id ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
    </footer>
  </div>
</main>

<?php $include('partials/footer'); ?>
