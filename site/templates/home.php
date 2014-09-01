<?php snippet('header') ?>

<section id="content">

  <article><div class="in"><div class="container-fluid">

    <div class="row">

      <div class="col-sm-6 tabulize">

        <h1><?= html($page->title()) ?></h1>

        <?= kirbytext($page->text()) ?>

      </div>

      <div class="col-sm-6">

        <ol id="qui-grid" class="row">
          <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
          <li class="col-sm-4">
            <h2><a href="#<?= $article->uid() ?>"><?= html($article->title()) ?></a></h2>
          </li>
          <?php endforeach ?>
        <ol>

      </div>

    </div>

  </div></div></article>

</section>

<section id="qui">
<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

  --><article id="<?= $article->uid() ?>" class="tabulize"><div class="in"><div class="container-fluid">

    <h2><?= html($article->title()) ?></h2>

    <?= kirbytext($article->text()) ?>

    <h3>Informations</h3>
    <?= kirbytext($article->informations()) ?>

  </div></div></article><!--

  <?php endforeach ?>
-->
</section>

<section id="abc">

  <article><div class="in"><div class="container">

    <?php $abc = $pages->find('abecedaire') ?>

    <?php $alphabetise = alphabetise($pages->find('abecedaire')->children()->visible()->sortby('title'), array('key' => 'title')); ?>

    <h2><?= $abc->title() ?></h2>

    <div class="row"><!--
      <?php foreach($alphabetise as $letter => $items): ?>
      --><section class="col-xs-12  col-sm-4  col-md-3  col-lg-2">
        <h3><?php echo strtoupper($letter) ?></h3>
        <ul>
          <?php foreach($items as $item): ?>
          <li>
            <a href="<?php echo $item->url()?>">
              <?php echo $item->title()?>
              <?= kirbytext($item->text()) ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      </section><!--
      <?php endforeach ?>
    --></div>

  </div></div></article>

</section>

<?php snippet('footer') ?>