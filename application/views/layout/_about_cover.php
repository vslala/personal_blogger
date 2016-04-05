<header class="intro-header" style="background-image: url(<?php if(isset($cover_image_url)){echo $cover_image_url;} else{echo $about[0]['cover_image'];}; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1 class="animated swing"><?php if(isset($about[0]['cover_heading'])){echo $about[0]['cover_heading'];} else{echo $cover_heading;} ?></h1>
                        <hr class="small">
                        <span class="subheading animated zoomInUp"><?php if(isset($about[0]['cover_subheading'])){echo $about[0]['cover_subheading'];} else{echo $cover_subheading;} ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
