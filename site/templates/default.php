<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('submenu') ?>

<section class="content">

  <article>
    <h1><?= html($page->title()) ?></h1>
    <?= kirbytext($page->text()) ?>
  </article>

</section>

<?php snippet('footer') ?>