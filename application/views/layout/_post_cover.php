<header class="intro-header" style="background-image: url('<?php if(isset($blog[0]['cover_image'])){echo $blog[0]['cover_image'];}elseif(isset($cover_image_url)){echo $cover_image_url;}else{echo base_url().'img/post-bg.jpg';}; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1 style="background-color: rgba(00,00,00,.5);"><?= $cover_heading; ?></h1>
                    <span style="background-color: rgba(00,00,00,.5)" class="meta"><?= $cover_subheading; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
