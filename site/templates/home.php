<?php snippet('header') ?>

<!-- Message en format portrai -->
<div class="portrait-msg">
  <div class="container">
  <h1>L'application "Qui ? résiste, Laboratoire graphique et poétique de Pierre Di Sciullo" s'utilise en format paysage.</h1>
  <!-- <div class="ipad-draw-P col-xs-4"></div><div class="col-xs-3"><span class="glyphicon glyphicon-arrow-right"></div><div class="ipad-draw-L col-xs-5"></div>-->
  <img src="<?= url('assets/images/TurnTheIPAD.jpg') ?>" alt="<?= html($site->title()) ?>" />
  </div>
</div>
<!--  Jusque là -->

<section id="home">

  <article><div class="in"><div class="container-fluid">

    <header class="tabulize">

      <h1><?= html($page->title()) ?></h1>
      <!-- Btn trigger modal -->
      <a class="btn btn-default" data-toggle="modal" data-target="#introduction-box"> Introduction </a>
      <a class="btn btn-default" data-toggle="modal" data-target="#tutorial-box"> Tutorial </a>
      <a class="btn btn-default" data-toggle="modal" data-target="#credits-box"> crédits </a>
    </header>

    <nav>

      <ol class="row">
        <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
        <li class="col-xs-6 col-sm-4">
          <a href="#<?= $article->uid() ?>"><h2><?= html($article->title()) ?></h2></a>
        </li>
        <?php endforeach ?>
        <li class="col-xs-6 col-sm-4">
          <h2><a href="#abc"><span class="glyphicon glyphicon-volume-up"></span>Abécédaire</a></h2>
        </li>
      <ol>

    </nav>


  </div></div></article>

</section>

<?php snippet('inc.qui') ?>

<?php snippet('inc.abc') ?>

<button id="sound-play-pause" class="invisible btn">
  <span class="glyphicon glyphicon glyphicon-play"></span> / <span class="glyphicon glyphicon glyphicon-stop"></span>
</button>

<!-- Modal -->
<div class="modal fade" id="introduction-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Introduction</h4>
      </div>
      <div class="modal-body">
        <p><?= kirbytext($page->introduction()) ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-uppercase" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">TUTORIAL</h4>
      </div>
      <div class="modal-body row">
        <div class="col-sm-8"><img src="<?= url('assets/images/tutorial.png') ?>"></img></div>
        <div class="col-sm-4"><?= kirbytext($page->tutorial()) ?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-uppercase" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="credits-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crédits</h4>
      </div>
      <div class="modal-body">
        <p><?= kirbytext($page->credits()) ?></p>
        <img src="<?= url('assets/images/logos-partenaires.png') ?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default text-uppercase" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<?php snippet('inc.gallery') ?>

<div class="help">
      <a class="glyphicon glyphicon-question-sign" data-toggle="modal" data-target="#tutorial-box"></a>
</div>

<?php snippet('footer') ?>