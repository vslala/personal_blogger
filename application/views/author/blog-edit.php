<div class="hide" id="format_hint_info">
    <div class="format-hint-div-header">
        <button class="close-div" id="close-format-hint">Close</button>
    </div>
    <div class="format-hint-body">
        <script src="https://gist.github.com/jonschlinkert/5854601.js"></script>
    </div>   
</div>


<div class="container">
    <div class="row">
        <?= form_open('process/update'); ?>
        <input type="hidden" value="<?= $blog[0]['id']; ?>" name="blogId" />
        <div class="cl m8">
            <div class="row">
                <h4>Edit Your Blog</h4>
                <hr>
                <div class="clear-fix"></div>
        <div class="cl s12 m4">
            <label>Blog Title</label>
        </div>
        <div class="col s12">
            <input type="text" class="form-control" name="title" placeholder="Think of some catchy title to attract readers" value="<?= $blog[0]['heading']; ?>" validate />
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label>Write Your Blog Here...</label>
        </div>
        <div class="col s12">
            <textarea name="blog_content" class="form-control form-control-content" id="content" placeholder="Start writing your blog..." validate><?= $blog[0]['content']; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label>Summary Of Your Blog</label>
        </div>
        <div class="col s12">
            <textarea name="blog_summary" id="summary" maxlength="500" placeholder="This will help in getting the potential readers to your blog as this part is seen by readers when shared. It should make readers curious to read the rest of the blog..." validate><?= $blog[0]['summary']; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label>Featured Image Url</label>
        </div>
        <div class="col s12">
            <input type="text" name="featuredImage" class="form-control" placeholder="Enter image url" value="<?= $blog[0]['cover_image']; ?>" autocomplete="off"/>
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label>Blog Category</label>
        </div>
        <div class="col s12">
            <?php if (isset($categories[0])): ?>
                <select name="category" class="form-control-select">
                <?php foreach ($categories as $c): ?>
                    <?php if ($c['id'] == $blog[0]['category_id']): ?>
                        <option selected value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                    <?php continue; endif; ?>
                    <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                <?php endforeach; ?>
                </select>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label>Sort Order</label>
        </div>
        <div class="col s12">
            <input type="text" name="sort" class="form-control" placeholder="Enter image url" value="<?= $blog[0]['sort']; ?>" autocomplete="off"/>
        </div>
    </div>

    <div class="row">
        <div class="cl s12">
            <label></label>
        </div>
        <div class="col s12">
            <button type="submit" class="button button-primary">Update Blog</button>
        </div>
    </div>
        </div>
        <div class="cl m4"></div>

        <?= form_close(); ?>
    </div>
    
</div>


<div class="container">
    <hr>
    <div class="clear-fix"></div>
    <div class="row">
        <div class="save-image-container">
            <div class="save-image-container__head">
                <h4>Save Image To The Server</h4>
            </div>
            <div class="save-image-container__body">
                <?= form_open('process/saveImage', ['id'=>'image_form']); ?>
                    <div class="form-group">
                        <input type="text" name="dir" id="dir" placeholder="new directory name">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="image_url" id="image_url" placeholder="Paste the Image URL here..."></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Save Image</button>
                    </div>
                    <?= form_close(); ?>
            </div>
            <div class="save-image-container__footer" id="return_server_links"></div>
        </div>
    </div>
</div>
</div>



            

