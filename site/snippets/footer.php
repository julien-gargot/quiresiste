  </div> <!-- /.container -->

  <footer id="footer" class="footer">
    <div class="container">
      <?= kirbytext($site->copyright()) ?>
    </div>
  </footer>

  <?php snippet('dev') ?>

  <?=  js('assets/libraries/jquery.min.js') ?>
  <?=  js('assets/libraries/bootstrap/dist/js/bootstrap.min.js') ?>
  <?=  js('assets/scripts/main.js') ?>

</body>

</html>