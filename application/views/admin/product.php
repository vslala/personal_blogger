<div class="container">
	<div class="row first-row">
		<div class="col-md-1">

		</div>
		<div class="col-md-10">
			<div class="page-header">
				<div class="h2">Products</h2>
			</div>
			<a href="<?= base_url(); ?>index.php/admin/product_add" class="btn btn-success">Add Product</a>
            <br />
            <hr />
            <br />
			<div class="section" id="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="media-list">
            	<?php foreach ($products as $prod): ?>
              <li class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?= $prod['image_url']; ?>" height="64" width="64"></a>
                <div class="media-body">
                  <h4 class="media-heading"><?= $prod['name']; ?></h4>
                  <p><?= $prod['title']; ?></p>
                  <p>
                  	<a class="btn btn-info btn-sm" href="<?= base_url(); ?>index.php/admin/product_edit/<?= $prod['id']; ?>">Edit</a> |
                  	<a class="btn btn-danger btn-sm" href="<?= base_url(); ?>index.php/admin/product_delete/<?= $prod['id']; ?>">Delete</a>
                  </p>
                  <p>
                    <?= form_open('admin/product_images_add', ['role'=>'form', 'class'=>'form-inline', 'id'=>'product_image_form']); ?>
                      <input type="text" value="<?= $prod['id']; ?>" name="productId" id="product_id_input"/>
                      <input type="text" name="name" id="image_name_input" class="form-control" placeholder="Enter Image Name">
                      <input type="text" name="src" id="image_src_input" class="form-control" placeholder="Enter Image Url">
                      <input type="text" name="caption" id="image_caption_input" class="form-control" placeholder="Enter Image Caption">
                      <button class="btn btn-primary" name="addImageBtn" id="add_image_submit_btn" type="submit">Add Image</button>
                    <?= form_close(); ?>
                  </p>
                  <div class="clear" style="width: 20em;"></div>                  
                </div>
              </li>
          		<?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div> <!-- /section -->
		</div>
		<div class="col-md-1"></div>
	</div>
</div>