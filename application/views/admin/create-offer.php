<div class="container">   
    <div class="row first-row">
        <div class="col-md-9">
            <?php if(isset($confirmation)): ?>
            <div class="alert-success">
                <?php echo $confirmation; ?>
            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="h2">Create Offer</div>
                </div>
                <div class="panel-body">
                    <div class="form-group-lg">
                        <?= form_open('admin/createOffer'); ?>
                            <div class="form-group">
                                <label class="form-label col-md-4">Heading:</label>
                                <div class="col-md-8">
                                    <input type="text" name="heading" class="form-control" maxlength="500" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-12">
                                  
                                    <textarea style="height: 300px;" class="form-control" name="content" maxlength="20000" 
                                    placeholder="Start writing your offer details here..." ></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4">Summary:</label>
                                <div class="col-md-8">
                                  
                                    <textarea id="text_editor" class="form-control" style="height: 100px;" cols="48" name="summary" maxlength="1000"></textarea>

                                </div>
                            </div>                                   
                            <div class="form-group">
                                <label class="form-label col-md-4">Offer End-date: </label>
                                <div class="col-md-8">
                                    <input type="date" name="end_date" class="form-control" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="submit" onclick="parseText()" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Save Image
                    </div>
                    <div class="panel-body">
                        <?= form_open('admin/saveImage', ['id'=>'image_form']); ?>
                        <div class="form-group">
                            <input type="text" name="dir" id="dir" placeholder="new directory name">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="image_url" id="image_url"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Save Image</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



