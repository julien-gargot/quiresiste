<?php snippet('header') ?>

<section id="content">

  <article class="snap"><div class="in"><div class="container-fluid">

    <h1><?= html($page->title()) ?></h1>

    <?= kirbytext($page->text()) ?>

  </div></div></article>

</section>

<section id="qui">
<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

  --><article class="snap"><div class="in"><div class="container-fluid">

    <h2><?= html($article->title()) ?></h2>

    <?= kirbytext($article->text()) ?>

  </div></div></article><!--

  <?php endforeach ?>
-->
</section>

<section id="abc">

  <article class="snap"><div class="in"><div class="container-fluid">

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