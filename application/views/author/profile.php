<?php
    $summary = $about = $email = $mobile = $featuredImage = null;
    if (isset($user[0]['summary'])) $summary = $user[0]['summary']; else $summary = "";
    if (isset($user[0]['about'])) $about = $user[0]['about']; else $about = "";
    if (isset($user[0]['email'])) $email = $user[0]['email']; else $email = "";
    if (isset($user[0]['mobile'])) $mobile = $user[0]['mobile']; else $mobile = "";
    if (isset($user[0]['featured_image'])) $featuredImage = $user[0]['featured_image']; else $featuredImage = "";
?>


<div class="container">
    <div class="row" id="flash_message">

    </div>
    <div class="row">
        <div class="col m6" class="left-section">
            <div class="row">
                <div class="col s12 m12">
                    <label>About</label>
                </div>
                <div class="col s12 m12">
                    <?= form_open('process/editUserDetails', ['class' => 'userProfileForm']); ?>
                    <input type="hidden" value="<?= $this->encrypt->encode('about'); ?>" name="type">
                    <p><textarea name="about" id="about"><?= $about ?></textarea><br /><button type="submit" class="button button-edit" id="edit_btn" data-target="about_text">save</button></p>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <label>Summary About You (used when your page is shared)</label>
                </div>
                <div class="col s12 m12">
                    <?= form_open('process/editUserDetails', ['class' => 'userProfileForm']); ?>
                    <input type="hidden" value="<?= $this->encrypt->encode('summary'); ?>" name="type">
                    <p><textarea name="summary" id="summaru"><?= $summary ?></textarea><br /><button type="submit" class="button button-edit" id="edit_btn" data-target="about_text">save</button></p>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <label>Email</label>
                </div>
                <div class="col s12 m12">
                    <?= form_open('process/editUserDetails', ['class' => 'userProfileForm']); ?>
                    <input type="hidden" value="<?= $this->encrypt->encode('email'); ?>" name="type">
                    <p><input type="text" name="email" value="<?= $email ?>"><br /><button type="submit" class="button button-edit" id="edit_btn" data-target="about_text">save</button></p>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <label>Mobile</label>
                </div>
                <div class="col s12 m12">
                    <?= form_open('process/editUserDetails', ['class' => 'userProfileForm']); ?>
                    <input type="hidden" value="<?= $this->encrypt->encode('mobile'); ?>" name="type">
                    <p><input type="text" name="mobile" value="<?= $mobile ?>"><br /><button type="submit" class="button button-edit" id="edit_btn" data-target="about_text">save</button></p>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <label>Featured Image</label>
                </div>
                <div class="col s12 m12">
                    <?= form_open_multipart('process/editUserDetails'); ?>
                    <input type="hidden" value="<?= $this->encrypt->encode('featured_image'); ?>" name="type">
                    <p><input id="file_upload" type="file" name="featured_image"><br /><button type="submit" class="button button-edit" id="edit_btn" data-target="about_text">save</button></p>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="row">
                <label>Facebook Profile Url</label>
                <p><a href="http://facebook.com/varun.shrivastava.3">varun.shrivastava.3</a></p>
            </div>
            <div class="row">
                <label>Twitter Username</label>
                <p><a href="http://twitter.com/vs_shrivastava">vs_shrivastava</a></p>
            </div>
            <div class="row">
                <label>LinkedIn Username</label>
                <p><a href="">shrivastavavarun</a></p>
            </div>
            <div class="row">
                <label>Google Plus</label>
                <p><a href="">Varunshrivastava007</a></p>
            </div>

        </div>
        <div class="col m6">
            <div class="image-banner">
                <img src="<?= base_url().$featuredImage ?>" class="image-banner__banner-img"></img>
            </div>
        </div>
    </div>
</div>