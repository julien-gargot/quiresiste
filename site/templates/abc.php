<?php snippet('header') ?>

<section class="content">

  <?php if($page->hasSounds()): ?>
  <article>
    <h1><?= html($page->title()) ?></h1>
    <?= kirbytext($page->text()) ?>

    <?php foreach($page->sounds() as $sound): ?>
    <audio controls>
      <source src="<?= $sound->url() ?>" type="audio/mpeg">
      Your browser does not support this audio format.
    </audio>
    <?php endforeach ?>
  </article>
  <?php endif ?>

</section>

<?php snippet('footer') ?>