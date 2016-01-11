<div class="container">   
    <div class="row first-row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php if(isset($confirmation)): ?>
            <div class="alert-success">
                <?php echo $confirmation; ?>
            </div>
            <?php            endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="h2">Compose Blog</div>
                </div>
                <div class="panel-body">
                    <div class="form-group-lg">
                        <?= form_open('admin/create'); ?>
                            <input type="hidden" name="author" value="<?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>">
                            <input type="hidden" id="posted_on" name="posted_on" value="" />
                            <div class="form-group">
                                <label class="form-label col-md-4">Heading:</label>
                                <div class="col-md-8">
                                    <input type="text" name="heading" class="form-control" maxlength="500" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Content:</label>
                                <div class="col-md-8">
                                  
                                    <textarea id="text_editor" class="text-editor" rows="10" cols="48" name="content" maxlength="30000" ></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Summary:</label>
                                <div class="col-md-8">
                                  
                                    <textarea id="text_editor" class="form-control" rows="3" cols="48" name="summary" maxlength="500"></textarea>

                                </div>
                            </div>              
<!--                            <div class="form-group">
                                <label class="form-label col-md-4">Image:</label>
                                <div class="col-md-8">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label class="form-label col-md-4">Tags: </label>
                                <div class="col-md-8">
                                    <input type="text" name="tags" class="form-control" placeholder="ex: #science #technology etc" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Cover Image Url: </label>
                                <div class="col-md-8">
                                    <input type="text" name="coverImage" class="form-control" placeholder="Enter image url" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Category: </label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control">
                                    <?php foreach ($categories as $c): ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Sort Order: </label>
                                <div class="col-md-8">
                                    <input type="number" step="any" name="sort" class="form-control" value="0" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="submit" onclick="parseText()" class="btn btn-success" name="saveBtn">Save</button>
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



