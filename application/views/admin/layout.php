<style>
    body{
        padding-top: 6em;
    }
    ul li{
        list-style: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            
            <div class="layout_form" id="layout_form_div">
                <h3>Add or Update Layout</h3>
                <?= form_open('admin/create_layout',['id'=>'layout_form']); ?>
                    <div class="form-group">
                        <input class="form-control" placeholder="Layout For Page?" name="forPage" id="for_page_input"/>
                        <div class="help-block" id="show_layout_pages">
                            <b>Available Layouts</b>
                            <ul id="available_layouts_list">
                                <?php foreach ($layouts as $l): ?>
                                    <li>
                                        <span class="pull-right"><a href="<?= site_url('admin/delete_layout').'/'.$l['for_page']; ?>" id="delete_layout_link">delete</a></span>
                                        <a href="#" id="for_page_list_element"><?= $l['for_page']; ?></a>
                                        <input type="hidden" value="<?= $l['cover_image']; ?>">
                                        <input type="hidden" value="<?= $l['cover_heading']; ?>">
                                        <input type="hidden" value="<?= $l['cover_subheading']; ?>">
                                    </li>
                                    
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="cover_image_input" placeholder="Cover Image Url" name="coverImage" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="cover_heading_input" placeholder="Cover Heading" name="coverHeading" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="cover_subheading_input" placeholder="Cover Sub-Heading" name="coverSubHeading" />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Add/Update Layout" name="submitBtn" />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>