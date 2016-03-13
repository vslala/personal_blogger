
<div class="container">
    <div class="row">
        <div class="col m2"></div>
        <div class="col m10">
                <h4><u>Author's Login<u></h4>
                    <?= form_open('process/authenticate'); ?>
                    <div class="row">
                        <div class="col m2"><label>Username</label></div>
                        <div class="col m10">
                            <input type="text" name="username" id="username" validate/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m2"><label>Password</label></div>
                        <div class="col m10">
                            <input type="password" name="password" id="password" validate>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m2"><label></label></div>
                        <div class="col m10">
                            <button type="submit" class="button primary" id="login_btn">Login</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
        </div>
    </div>
</div>
