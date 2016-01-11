<div class="container">    
    <div class="row first-row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($message)): ?>
            <div class="alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
            <div class="alert-danger">
                <?= $error; ?>
            </div>
            <?php endif; ?>
            
            <section class="about-edit">
                <button class="btn btn-default" type="button" onclick="previewText()" id="preview_button">Preview</button>
                <?= form_open('admin/update_about'); ?>
                    <input type="hidden" name="id" value="<?php if(isset($about[0])){echo $about[0]['id']; }else{ echo ''; } ?>" >
                    <div class="form-group">
                        <textarea name="content" class="form-control" id="about" rows="10"><?php if(isset($about[0])){echo $about[0]['about_me']; }else{ echo ''; } ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="coverImage" placeholder="Cover Image Url" class="form-control" value="<?= $about[0]['cover_image']; ?>" id="cover_image" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="coverHeading" placeholder="Cover Heading" class="form-control" value="<?= $about[0]['cover_heading']; ?>" id="cover_heading" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="coverSubHeading" placeholder="Cover Sub Heading" class="form-control" value="<?= $about[0]['cover_subheading']; ?>" id="cover_subheading" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="aboutSubmit" class="btn btn-md btn-primary" value="Update" id="submitBtn" />
                    </div>
                <?=     form_close(); ?>
                <hr>
                <div class="form-group">
                    <div class="preview" id="preview_pane" contenteditable="false">
                        
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>