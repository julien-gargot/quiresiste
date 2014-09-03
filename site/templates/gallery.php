<?php snippet('header') ?>

<section class="content">

  <?php if($page->hasImages()): ?>
  <article id="carousel-gallery" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <? $i = 0 ?>
      <?php foreach($page->images() as $image): ?>
      <li data-target="#carousel-gallery" data-slide-to="<?= $i ?>" <? if($i==0) echo 'class="active"' ?>></li>
      <?php $i++; endforeach ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <? $i = 0 ?>
      <?php foreach($page->images() as $image): ?>
      <figure class="item <? if($i==0) echo 'active' ?>">
        <img src="<?php echo $image->url() ?>" alt="">
        <figcaption class="carousel-caption">
          <h3><?= $image->title() ?></h3>
          <?= kirbytext($image->text()) ?>
        </figcaption>
      </figure>
      <?php $i++; endforeach ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-gallery" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-gallery" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </article>
  <?php endif ?>

</section>

<?php snippet('footer') ?>