<?php
    $summary = $about = $email = $mobile = $featuredImage = null;
    if (isset($user[0]['summary'])) $summary = $user[0]['summary']; else $summary = "";
    if (isset($user[0]['about'])) $about = $user[0]['about']; else $about = "";
    if (isset($user[0]['email'])) $email = $user[0]['email']; else $email = "";
    if (isset($user[0]['mobile'])) $mobile = $user[0]['mobile']; else $mobile = "";
    if (isset($user[0]['featured_image'])) $featuredImage = $user[0]['featured_image']; else $featuredImage = "";
?>


<div class="container">
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


        </div>
        <div class="col s12 m6">
            <div class="image-banner">
                <?php if (! empty($featuredImage)): ?>
                    <img src="<?= base_url().$featuredImage ?>" class="image-banner__banner-img responsive-img" />
                    <?php else: ?>
                    <h4>You haven't Uploaded Any Image Yet!!!</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Social Handle Section -->
    <div class="row">
        <div class="cl s12 m6 l6">
            <section class="social-handle">
                <div class="social-handle__panel">
                    <div class="social-handle_panel__header">
                        <h3>Add Social Handle</h3>
                    </div>
                    <div class="social-handle_panel__body">
                        <?= form_open('process/addSocialHandle', ['id'=>'social_handle_form']); ?>
                        <?php if (isset($socialHandles[0])): ?>
                            <select name="social_handles_id" class="form-control">
                            <?php foreach ($socialHandles as $sh): ?>
                            <option value="<?= $sh['id'] ?>"><?= $sh['name'] ?></option>
                            <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                        <div class="row">
                            <label for="handle_username">Corresponding Username</label>
                            <br/>
                            <input type="text" name="handle_username" class="form-control"/>
                        </div>
                        <div class="row">
                            <button type="submit" class="button button-primary">Add Social Handle</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <div class="social-handle_panel__footer">
                        <div class="row">
                            <?php if (isset ($socialHandles[0])): ?>
                                <?php foreach ($socialHandles as $sh): ?>
                                    <label for="<?= $sh['name'] ?>"><?= $sh['name'] ?></label><br />
                                    <a href="<?= $sh['website'].$sh['handle_username'] ?>"><?= $sh['handle_username'] ?></a><br />

                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>