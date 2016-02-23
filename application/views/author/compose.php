<div class="hide" id="format_hint_info">
    <div class="format-hint-div-header">
        <button class="close-div" id="close-format-hint">Close</button>
    </div>
    <div class="format-hint-body">
        <script src="https://gist.github.com/jonschlinkert/5854601.js"></script>
    </div>   
</div>

<div class="pure-g">
    <div class="pure-u-1-5"></div>
    <div class="pure-u-3-5">
        <section>
            <div class="compose-form-container">
                <div class="compose-form-header"> <h3>Compose your blog!</h3> </div>
                <div class="compose-form-body">
                    <?= form_open('process/create'); ?>
                    <input type="hidden" name="author" value="<?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>">
                    <input type="hidden" id="posted_on" name="posted_on" value="" />
                    <table class="table">
                        <tr>
                            <td>Blog Title</td>
                            <td><input type="text" class="form-control" maxlength="500" length="500" name="title" placeholder="Think of some catchy title to attract readers" validate /></td>
                        </tr>
                        <tr>
                            <td>Blog Content</td>
                            <td><textarea name="blog_content" class="form-control form-control-content" id="content" maxlength="50000" length="50000" placeholder="Start writing your blog..." validate></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" id="format_hint">formatting help</a> </td>
                        </tr>
                        <tr>
                            <td>Blog Summary</td>
                            <td><textarea name="blog_summary" class="form-control form-control-summary" id="summary" maxlength="500" length="500" placeholder="This will help in getting the potential readers to your blog as this part is seen by readers when shared. It should make readers curious to read the rest of the blog..." validate></textarea></td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td><input type="text" name="tags" class="form-control" placeholder="ex: science, technology, etc" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Featured Image Url</td>
                            <td><input type="text" name="featuredImage" class="form-control" placeholder="Enter image url" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Blog Category</td>
                            <td>
                                <?php if (isset($categories[0])): ?>
                                <select name="category" class="form-control">
                                <?php foreach ($categories as $c): ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="button button-primary">Create Blog</button></td>
                        </tr>
                    </table>
                    <?= form_close(); ?>
                </div>
            </div>
        </section>
    </div>
    <div class="pure-u-1-5"></div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/build/author/user_script.js"></script>
