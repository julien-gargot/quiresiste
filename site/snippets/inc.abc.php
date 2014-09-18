<section id="abc">

  <article><div class="in"><div class="container">

    <?php $abc = $pages->find('abecedaire') ?>

    <?php $alphabetise = alphabetise($pages->find('abecedaire')->children()->visible()->sortby('title'), array('key' => 'title')); ?>

    <h2><?= $abc->title() ?></h2>

    <section><!--
      <?php foreach($alphabetise as $letter => $items): ?>
      -->
        <h3><?= strtoupper($letter) ?></h3>
        <ul>
          <?php foreach($items as $item): ?>
          <li>
            <?php if ( $item->hasSounds() ): ?>
            <?php $attribut = 'class="audio-link" data-target="'.$item->sounds()->first()->url().'"' ?>
            <?php else: ?>
            <?php $attribut = "" ?>
            <?php endif ?>
            <a <?= $attribut ?>>
              <span class="glyphicon glyphicon-volume-up"></span>
              <?= $item->title()?>
              <?= kirbytext($item->text()) ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      <!--
      <?php endforeach ?>
    --></section>

  </div></div></article>

</section>