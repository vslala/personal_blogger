<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll navbar-inverse">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('/'); ?>">My Blogs</a>
            </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right nav-tabs navbar-inverse">
                            <li class="<?php if (isset($setHomeActive)) echo $setHomeActive; ?>"><a href="<?= site_url('admin/home'); ?>">Home</a></li>  
                            <li class="<?php if (isset($setAboutActive)) echo $setAboutActive; ?>"><a href="<?= site_url('admin/about'); ?>">About</a></li>
                            <li class="<?php if (isset($setProjectActive)) echo $setProjectActive; ?>"><a href="<?= site_url('admin/project'); ?>">Projects</a></li>
                            <li class="<?php if (isset($setProductActive)) echo $setProductActive; ?>"><a href="<?= site_url('admin/product'); ?>">Products</a></li>
                            <li class="<?php if (isset($setComposeActive)) echo $setComposeActive; ?>"><a href="<?= site_url('admin/compose'); ?>">Compose</a></li>
                            <li class="<?php if (isset($setCategoryActive)) echo $setCategoryActive; ?>"><a href="<?= site_url('admin/category'); ?>">Category</a></li>
                            <li class="<?php if (isset($setLayoutActive)) echo $setLayoutActive; ?>"><a href="<?= site_url('admin/layout'); ?>">Layout</a></li>
                            <li class="<?php if (isset($setContactActive)) echo $setContactActive; ?>"><a href="<?= site_url('admin/contact'); ?>">Contact</a></li>
                            <li><a href="<?= site_url('admin/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
            </nav>

        </div>

</nav>