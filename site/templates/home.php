<?php snippet('header') ?>

<section id="content">

  <article><div class="in"><div class="container-fluid">

    <h1><?= html($page->title()) ?></h1>

    <?= kirbytext($page->text()) ?>

    <ol>
      <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
      <li>
        <h2><a href="#<?= $article->uid() ?>"><?= html($article->title()) ?></a></h2>
      </li>
      <?php endforeach ?>
    <ol>

  </div></div></article>

</section>

<section id="qui">
<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

  --><article id="<?= $article->uid() ?>"><div class="in"><div class="container-fluid">

    <h2><?= html($article->title()) ?></h2>

    <?= kirbytext($article->text()) ?>

    <h3>Informations</h3>
    <?= kirbytext($article->informations()) ?>

  </div></div></article><!--

  <?php endforeach ?>
-->
</section>

<section id="abc">

  <article><div class="in"><div class="container-fluid">

    <?php $abc = $pages->find('abecedaire') ?>

    <h2><?= $abc->title() ?></h2>

    <ol>
      <?php foreach($abc->children()->visible()->sortBy($sort='title', $direction='asc') as $word): ?>
      <li>

        <h3><?= html($word->title()) ?></h3>

        <?= kirbytext($word->text()) ?>

      </li>
      <?php endforeach ?>
    </ol>

  </div></div></article>

</section>

<?php snippet('footer') ?>