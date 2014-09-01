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
          <div class="row" id="panel-soustitre">
                    <div class="col-sm-6" id="panel-soustitre">
                        <a data-toggle="modal" href="#infos"><div class="button-link"><h4>Introduction</h4></div></a>

                    <div class="modal" id="infos">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h4 class="modal-title">introduction</h4>
                          </div>
                          <div class="modal-body">
                            Le Tigre (Panthera tigris) est un mammifère carnivore de la famille des félidés...
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal">Fermer</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6" id="panel-soustitre">
                        <a data-toggle="modal" href="#infos"><div class="button-link"><h4>Tutorial</h4></div></a>

                    <div class="modal" id="infos">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h4 class="modal-title">introduction</h4>
                          </div>
                          <div class="modal-body">
                            Le Tigre (Panthera tigris) est un mammifère carnivore de la famille des félidés...
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal">Fermer</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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



<!--
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
-->
  <article id="<?= $article->uid() ?>">
  
  <div class="container-red-line">
    <div class="container-fluid" id="red-line">
  </div></div>
     
  <div class="in">

    <div class="container-fluid">
    
    <div class="col-sm-6">
    <h1>N°<?= html($article->numero()) ?> <?= html($article->title()) ?></h1>
    </div>
    <div class="panel-QR col-sm-4"><?= kirbytext($article->text()) ?></div>
          
  </div></div></article><!--

  <?php endforeach ?>
-->
</section>

<section id="abc">

  <article><div class="in"><div class="container-fluid">

    <?php $abc = $pages->find('abecedaire') ?>

    <?php $alphabetise = alphabetise($pages->find('abecedaire')->children()->visible()->sortby('title'), array('key' => 'title')); ?>

    <h1><?= $abc->title() ?></h1>

    <div class="row"><!--
      <?php foreach($alphabetise as $letter => $items): ?>
      --><section class="col-xs-12  col-sm-3  col-md-3  col-lg-2">
        <h3><?php echo strtoupper($letter) ?></h3>
        <ul>
          <?php foreach($items as $item): ?>
          <li>
            <a href="<?php echo $item->url()?>">
              <div class="button-link">
                <h4>
                  <?php echo $item->title()?>
                  <?= kirbytext($item->text()) ?>
                </h4>
            </div>
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