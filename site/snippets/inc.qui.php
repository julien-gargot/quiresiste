<section id="qui">
<!--
  <?php $i = 0 ?>
  <?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>

--><article id="<?= $article->uid() ?>" class="viewport viewport-<?= $i ?>-1"><div class="in"><div class="container-fluid">

      <header>

        <h2><?= html($article->title()) ?></h2>

      </header>

      <section class="tabulize">

        <?= kirbytext($article->text()) ?>

      </section>

      <aside>

        <ul class="nav nav-pills nav-stacked sounds">
          <?php $j = 0 ?>
          <?php foreach (related($article->related()) as $related): ?>
          <li>
            <?php if ( $related->hasSounds() ): ?>
            <p class="audio-link" data-target="<?= $related->sounds()->first()->url() ?>"><span class="glyphicon glyphicon-volume-up"></span> <?php echo html($related->title()) ?></p>
            <?php endif ?>
          </li>
          <?php $j++; endforeach; ?>
        </ul>
        <ul class="nav nav-pills nav-stacked galleries">
          <?php $j = 0 ?>
          <?php foreach ($article->children()->visible() as $gallery): ?>
          <li class="<?= preg_replace('/\d+-/', '', $gallery->dirname) ?>">
            <!-- Button trigger modal -->
            <a data-toggle="modal" data-target="#gallery-<?= $i ?>-<?= $j ?>" data-src="<?= $gallery->url() ?>">
              <?= $gallery->title() ?>
            </a>
            <?php if ($article->hasImages() && $article->images()->find($gallery->dirname.'.png')): ?>
            <a data-toggle="modal" data-target="#gallery-<?= $i ?>-<?= $j ?>" data-src="<?= $gallery->url() ?>">
              <img src="<?= $article->images()->find($gallery->dirname.'.png')->url() ?>" alt="">
            </a>
            <?php endif ?>
          </li>
          <?php $j++; endforeach; ?>
        </ul>
      </aside>

    </div>

  </div></div></article><!--

  <?php $i++; endforeach ?>
-->
</section>