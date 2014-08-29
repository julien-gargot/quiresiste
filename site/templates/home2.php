<?php snippet('header') ?>

<section class="content" id="menu">

<div id="conteneur-image"><img src="assets/images/BACKGROUND_yo.jpg" width="6300" height="5609" id="bgimg"></div>

  <div class="container-red-line">
        <div class="container-fluid" id="red-line">
        </div>
  </div>

  <article><div class="in"><div class="container-fluid">

    <div class="row">
      <div class="col-sm-6">
          <div class="col-sm-12" id="logoQR">
            <img src="assets/images/titreQuiresiste.png"></img>
          </div>  
          <div class="col-sm-12">
            <h1><?= html($page->title()) ?></h1>
          </div>
          <div class="col-sm-4">
            <h3>Introduction</h3>
          </div>
          <div class="col-sm-4">
            <h3>Tuto</h3>
          </div>
          <div class="col-sm-4">
            <h3>Crédits</h3>
          </div>

      </div>
      <div class="col-sm-6" id="box-grid">
            <ol>
              <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
              <div class="col-sm-4">
              <li>
                <a href="#<?= $article->uid() ?>"><div class="button-link"><h2><?= html($article->numero()) ?></h2><h4><?= html($article->title()) ?></h4></div></a>
              </li>
              </div>
              <?php endforeach ?>
            </div>
            <ol>
        </div>
      </div>
  </div></div></article>

</section>

<section id="qui">

<!-- /!\ pb fond noir -->
  <div class="container-red-line">
        <div class="container-fluid" id="red-line">
        </div>
  </div> 


<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
-->
  <article id="<?= $article->uid() ?>">
  <div class="in"><div class="row">
          <div class="col-sm-6">
          <h1>N°<?= html($article->numero()) ?> <?= html($article->title()) ?></h1>
          </div>
              <?= kirbytext($article->text()) ?>
              <h3>Informations</h3>
              <?= kirbytext($article->informations()) ?>
</div>
</div></article><!--

  <?php endforeach ?>
-->
</section>

<section id="abc">

  <article><div class="in"><div class="container-fluid">

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