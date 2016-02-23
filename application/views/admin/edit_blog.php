<div class="container">    
    <div class="row first-row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($message)): ?>
            <div class="h3">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if(isset($confirmation)): ?>
                    <div class='alert-success'>
                        <?= $confirmation; ?>
                    </div>
                    <?php endif; ?>
                    <div class="h2">Edit Blog</div>
                </div>
                <div class="panel-body">
                    <div class="form-group-lg">
                        <?= form_open('admin/update'); ?>
                            <input type="hidden" value="<?= $blogId; ?>" name="blogId" id="blog_id"/>
                            <input type="hidden" value="<?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>">
                            <div class="form-group">
                                <label class="form-label col-md-4">Heading:</label>
                                <div class="col-md-8">
                                    <input type="text" value="<?php if(isset($heading)) echo $heading; else echo ''; ?>" name="heading" class="form-control" maxlength="500" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Content:</label>
                                <div class="col-md-8">
                                    <textarea rows="10" name="text_content" class="form-control" maxlength="30000" id="text_editor">
                                        <?php if(isset($blog[0]['content'])) echo $blog[0]['content']; else echo ''; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Summary:</label>
                                <div class="col-md-8">
                                  
                                    <textarea id="text_editor" class="form-control" rows="3" cols="48" name="summary" maxlength="500"><?= $blog[0]['summary']; ?></textarea>

                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="form-label col-md-4">Cover Image Url:</label>
                                <div class="col-md-8">
                                    <input type="text" value="<?php if(isset($blog[0]['cover_image'])) echo $blog[0]['cover_image']; else echo ''; ?>" name="coverImage" class="form-control" maxlength="500" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Category: </label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control">
                                    <?php foreach ($categories as $c): ?>
										<?php if($c['id'] == $blog[0]['category_id']): ?>
											<option value="<?= $c['id']; ?>" selected="selected"><?= $c['name']; ?></option>
										<?php else: ?>	
											<option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
										<?php endif; ?>
                                        
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Related Blog: </label>
                                <div class="col-md-8">
                                    <select name="related_blog" class="form-control" id="related_blog" onchange="getRelatedBlog()">
                                        <?php foreach($blogs as $b): ?>
                                            <option value="<?= $b['id']; ?>"><?= $b['heading']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div id="related_blog_iframe" class="related_blog_iframe" contenteditable="false">
                                        <?php foreach($related_blogs as $rb): ?>
                                            <div id="related_blog_heading">
                                                <span class="heading pull-left"><?= $rb[0]['heading']; ?></span>
                                                <span class="pull-right delete" >
                                                    <a id="delete_r_blog" href="<?= base_url(); ?>index.php/admin/deleteRelatedBlog/<?= $rb[0]['id']; ?>">delete</a>
                                                </span>
                                            </div>
                                            <br />
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Sort Order:</label>
                                <div class="col-md-8">
                                    <input type="number" step="any" value="<?php if(isset($sort)) echo $sort; else echo ''; ?>" name="sort" class="form-control" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success" name="updateBtn">Update</button>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>