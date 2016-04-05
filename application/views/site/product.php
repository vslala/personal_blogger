<div class="sections">
      <div class="container bg-white">
        <div class="row">
        	<?php foreach ($products as $prod): ?>
          <div class="col-md-6">
            <div class="product_display">
          	<a href="<?= base_url();?>index.php/site/product_description/<?= $prod['id'].'/'.url_title($prod['name']); ?>" class="plain-anchor">
            	<img src="<?= $prod['image_url']; ?>"
            	class="img-responsive" style="height: 250px;">
            	<h1><?= $prod['name']; ?></h1>
            	<h4><?= $prod['title']; ?></h4>
            	<div class='summary'>
            		<?= substr($prod['description'], 0, 150).'...'; ?>
            	</div>
        	</a>
          </div>
          </div>    
          <?php endforeach; ?>     
        </div>
      </div>
    </div>
</div>