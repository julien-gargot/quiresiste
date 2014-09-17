<section id="qui">
<!--
  <?php $i = 0 ?>
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

--><article id="<?= $article->uid() ?>"><div class="in"><div class="container-fluid">

      <header>

        <h2><?= html($article->title()) ?></h2>

      </header>

      <section class="tabulize">

        <?= kirbytext($article->text()) ?>

      </section>

      <aside>

        <ul class="nav nav-pills nav-stacked sounds">
          <?php foreach (related($article->related()) as $related): ?>
          <li>
            <p><span class="glyphicon glyphicon-volume-up"></span> <?php echo html($related->title()) ?></p>
            <audio controls>
              <source src="<?php echo $related->url() ?>" type="audio/mpeg">
              Your browser does not support this audio format.
            </audio>
          </li>
          <?php endforeach ?>
        </ul>
        <ul class="nav nav-pills nav-stacked galleries">
          <?php $j = 0 ?>
          <?php foreach ($article->children()->visible() as $gallery): ?>
          <li class="<?= preg_replace('/\d+-/', '', $gallery->dirname) ?>">
            <!-- Button trigger modal -->
            <a data-toggle="modal" data-target="#gallery-<?= $i ?>-<?= $j ?>" data-src="<?= $gallery->url() ?>">
              <?= $gallery->title() ?>
              <?php if ($article->hasImages()): ?>
                <!-- <img src="<?= $article->images()->find($gallery->dirname.'.png')->url() ?>" alt=""> -->
              <?php endif ?>
            </a>
            <?php if ($article->hasImages()): ?>
            <a data-toggle="modal" data-target="#gallery-<?= $i ?>-<?= $j ?>" data-src="<?= $gallery->url() ?>">
              <img src="<?= $article->images()->find($gallery->dirname.'.png')->url() ?>" alt="">
            </a>
            <?php endif ?>
          </li>
          <?php $j++; endforeach ?>
        </ul>
      </aside>

    </div>

  </div></div></article><!--

  <?php $i++; endforeach ?>
-->
</section>