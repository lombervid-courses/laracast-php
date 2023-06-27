<?php require __DIR__ . '/partials/head.php'; ?>
<?php require __DIR__ . '/partials/nav.php'; ?>
<?php require __DIR__ . '/partials/banner.php'; ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php foreach ($notes as $note) : ?>
      <li>
        <a href="/note?id=<?= $note->id ?>" class="text-blue-500 hover:underline">
          <?= $note->body ?>
        </a>
      </li>
    <?php endforeach ?>
  </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
