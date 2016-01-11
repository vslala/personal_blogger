<div class="container">
	<div class="row first-row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="page-header">
				<h3>Add a New Product</h3>
			</div>
			<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?= form_open('admin/product_update', ['role'=>'form', 'class'=>'form-horizontal']); ?>
            <input type="hidden" name="id" value="<?= $product[0]['id']; ?>"> 
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">Product Name</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Product Name"
                  name="name" value="<?= $product[0]['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Product Title</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Title" name="title" value="<?= $product[0]['title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Product Tag-Line</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Tagline" name="tagLine" value="<?= $product[0]['tag_line']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Description</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description"
                  id="description"><?= $product[0]['description']; ?></textarea>
                  <script type="text/javascript">CKEDITOR.replace( 'description' );</script>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Product Image</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Image Url" name="imageUrl" value="<?= $product[0]['image_url']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Status</label>
                </div>
                <div class="col-sm-10">
                  <input type="number" value="1" class="form-control" name="status" placeholder="Status" value="<?= $product[0]['status']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="submitBtn">Update Product</button>
                </div>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div
		</div>
		<div class="col-md-1"></div>
	</div>
</div>