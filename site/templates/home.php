<?php snippet('header') ?>

<section id="home">

  <article><div class="in"><div class="container-fluid">

    <header class="tabulize">

      <h1><?= html($page->title()) ?></h1>
      <!-- Btn trigger modal -->
      <a class="btn btn-default" data-toggle="modal" data-target="#introduction-box"> Introduction </a>
      <a class="btn btn-default" data-toggle="modal" data-target="#tutorial-box"> Tutorial </a>
      <a class="btn btn-default" data-toggle="modal" data-target="#credits-box"> crédits </a>
    </header>

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
          <div class="modal-body">
            <img src="<?= url('assets/images/tutorial.png') ?>"></img>
            <?= kirbytext($page->tutorial()) ?>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default text-uppercase" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <nav>

      <ol class="row">
        <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
        <li class="col-xs-6 col-sm-4">
          <h2><a href="#<?= $article->uid() ?>"><?= html($article->title()) ?></a></h2>
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

<?php snippet('inc.gallery') ?>

<?php snippet('footer') ?>