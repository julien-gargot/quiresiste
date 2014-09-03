<?php snippet('header') ?>

<section id="home">

  <article><div class="in"><div class="container-fluid">

    <header class="tabulize">

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
        <li class="col-sm-4">
          <h2><a href="#abc"><span class="glyphicon glyphicon-volume-up"></span></a></h2>
        </li>
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

        <section class="tabulize">

          <?= kirbytext($article->text()) ?>

          <h3>Informations</h3>

          <?= kirbytext($article->informations()) ?>

        </section>

        <aside>
          <ul class="nav nav-pills nav-stacked sounds">
            <?php foreach (related($article->related()) as $related): ?>
            <li>
              <a href=""><span class="glyphicon glyphicon-volume-up"></span> <?php echo html($related->title()) ?></a>
              <audio controls>
                <source src="<?php echo $related->url() ?>" type="audio/mpeg">
                Your browser does not support this audio format.
              </audio>
            </li>
            <?php endforeach ?>
          </ul>
          <ul class="nav nav-pills nav-stacked galleries">
            <? $i = 0 ?>
            <?php foreach ($article->children()->visible() as $gallery): ?>
            <li>
              <!-- Button trigger modal -->
              <a data-toggle="modal" data-target="#gallery<?= $i ?>" data-src="<?= $gallery->url() ?>">
                Launch demo modal
              </a>

              <!-- Modal -->
              <div class="modal fade" id="gallery<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-body">
                      <iframe frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php $i++; endforeach ?>
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