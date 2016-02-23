
<div class="pure-g">
    <div class="pure-u-sm-1-3"></div>
    <div class="pure-u-sm-1-3">
        <div class="login-container">
            <div class="login-header">
                <h3>Author's Login</h3>
            </div>
            <div class="login-body">
                <?= form_open('process/authenticate'); ?>
                <table class="table">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" id="username" validate/> </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" id="password" validate> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <button type="submit" class="button" id="login_btn">Login</button> </td>
                    </tr>
                </table>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="pure-u-sm-1-3"></div>
</div>
