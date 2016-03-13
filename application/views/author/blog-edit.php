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
                    <?= form_open('process/update'); ?>
                    <input value="<?= $blog[0]['id']; ?>" name="blogId" type="hidden">
                    <input type="hidden" name="author" value="<?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>">
                    <input type="hidden" id="posted_on" name="posted_on" value="" />
                    <table class="table">
                        <tr>
                            <td>Blog Title</td>
                            <td><input type="text" class="form-control" maxlength="500" length="500" name="title" value="<?php if (isset($blog[0]['heading'])) echo $blog[0]['heading']; ?>" validate /></td>
                        </tr>
                        <tr>
                            <?php
                                if (isset($blog[0]['content'])){
                                    $content = $blog[0]['content'];
                                }
                            ?>
                            <td>Blog Content</td>
                            <td><textarea name="blog_content" class="form-control form-control-content" id="content" maxlength="50000" length="50000" placeholder="Start writing your blog..." validate><?= $content; ?></textarea></td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td><a href="#" id="format_hint">formatting help</a> </td>
                        </tr> -->
                        <tr>
                            <?php 
                                if (isset($blog[0]['summary'])){
                                    $summary = $blog[0]['summary'];
                                }
                            ?>
                            <td>Blog Summary</td>
                            <td><textarea name="blog_summary" class="form-control form-control-summary" id="summary" maxlength="500" length="500" validate><?= $summary; ?></textarea></td>
                        </tr>
                        <tr>
                            <?php
                                if (isset($blog[0]['cover_image'])){
                                    $featuredImage = $blog[0]['cover_image'];
                                }
                            ?>
                            <td>Featured Image Url</td>
                            <td><input type="text" name="featuredImage" class="form-control" value="<?= $featuredImage; ?>" autocomplete="off"/></td>
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
                            <td><button type="submit" class="button button-primary">Update Blog</button></td>
                        </tr>
                    </table>
                    <?= form_close(); ?>
                </div>
            </div>
        </section>
    </div>
    <div class="pure-u-1-5"></div>
</div>

