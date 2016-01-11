<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="h2">Admin Login</div>
                </div>
                <div class="panel-body">
                    <?= form_open('admin/login'); ?>
                        <div class="form-group">
                            <label class="form-label col-md-4">Username:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label col-md-4">Password:</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label col-md-4"></label>
                            <div class="col-md-8">
                                <button class="btn btn-primary" type="submit" name="loginBtn">Login</button>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
