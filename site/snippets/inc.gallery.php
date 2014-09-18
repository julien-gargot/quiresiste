<?php $i = 0 ?>
<?php foreach($pages->find('qui-resiste')->children()->visible() as $article): ?>
  <?php $j = 0 ?>
  <?php foreach ($article->children()->visible() as $gallery): ?>
    <!-- Modal -->
    <div class="modal fade" id="gallery-<?= $i ?>-<?= $j ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <iframe frameborder="0"></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">FERMER</button>
          </div>
        </div>
      </div>
    </div>
  <?php $j++; endforeach ?>
<?php $i++; endforeach ?>


