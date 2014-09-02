<?php snippet('header') ?>

<section id="home">

  <article><div class="in"><div class="container-fluid">

    <header>

      <h1><?= html($page->title()) ?></h1>

      <?= kirbytext($page->text()) ?>

    </header>

    <nav>

      <ol class="row">
        <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
        <li class="col-sm-4">
          <h2><a href="#<?= $article->uid() ?>"><?= html($article->title()) ?></a></h2>
        </li>
        <?php endforeach ?>
      <ol>

    </nav>


  </div></div></article>

</section>

<section id="qui">
<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

  --><article id="<?= $article->uid() ?>"><div class="in"><div class="container-fluid">

        <header>

          <h2><?= html($article->title()) ?></h2>

        </header>

        <section>

          <?= kirbytext($article->text()) ?>

          <h3>Informations</h3>

          <?= kirbytext($article->informations()) ?>

        </section>

        <aside>
          <ul class="nav nav-pills nav-stacked sounds">
            <?php foreach (related($article->related()) as $related): ?>
            <li><a href="<?php echo $related->url() ?>"><span class="glyphicon glyphicon-volume-up"></span> <?php echo html($related->title()) ?></a></li>
            <?php endforeach ?>
          </ul>
          <ul class="nav nav-pills nav-stacked galleries">
            <?php foreach ($article->children()->visible() as $gallery): ?>
            <li><a href="<?php echo $gallery->url() ?>"><?php echo html($gallery->title()) ?></a></li>
            <?php endforeach ?>
          </ul>
        </aside>

      </div>


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