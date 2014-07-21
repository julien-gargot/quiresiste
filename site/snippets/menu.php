<nav id="nav" class="navbar navbar-default" role="navigation">
  <ul class="nav navbar-nav">
    <?php foreach($pages->visible() AS $p): ?>
    <li <?= ($p->isOpen()) ? ' class="active"' : '' ?>><a href="<?= $p->url() ?>"><?= html($p->title()) ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>