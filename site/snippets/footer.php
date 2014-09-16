  <footer id="footer">
    <?= kirbytext($site->copyright()) ?>
  </footer>

  <?php snippet('dev') ?>

  <?=  js('assets/libraries/jquery.min.js') ?>
  <?=  js('assets/libraries/jquery.easing.min.js') ?>
  <?=  js('assets/libraries/scrollstop/jquery.scrollstop.js') ?>
  <?=  js('assets/libraries/bootstrap/dist/js/bootstrap.min.js') ?>
  <?=  js('assets/scripts/main.js?version='.time()) ?>

</body>

</html>