
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top"  style="position: fixed;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('/'); ?>">
                    <img src="<?= base_url(); ?>img/vs_logo.jpg" class="img img-responsive img-rounded" style="height: 3em; margin-top: -1em;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right navbar-inverse">
                    <li class="<?php if(isset($setHomeActive)){echo $setHomeActive;} ?>">
                        <a href="<?= site_url('site/index'); ?>">Home</a>
                    </li>
                    <li class="<?php if(isset($setAboutActive)){echo $setAboutActive;} ?>">
                        <a href="<?= site_url('site/about'); ?>">About</a>
                    </li>
                    <li class="<?php if(isset($setProductActive)){echo $setProductActive;} ?>">
                        <a href="<?= site_url('site/product'); ?>">Products</a>
                    </li>
                    <li class="<?php if(isset($setPortfolioActive)){echo $setPortfolioActive;} ?>">
                        <a href="<?= site_url('site/portfolio'); ?>">Portfolio</a>
                    </li>
<!--                    <li>
                        <a href="post.php">Post</a>
                    </li>-->
                    <li class="<?php if(isset($setContactActive)){echo $setContactActive;} ?>">
                        <a href="<?= site_url('site/contact'); ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>