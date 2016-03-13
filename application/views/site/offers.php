<section class="custom-modal">
    <div class="custom-modal__header">
        <div class="large-text bolder custom-modal--heading">
            Please answer few simple questions...
        </div>
        <div class="custom-model__close" id="close_custom_modal">&times;</div>
    </div>
    <hr>
    <div class="custom-modal__body">
        <p>Will this be your personal website?</p>
        <p><button id="yes_1">YES</button><button id="no_1">NO</button></p>
        </div>
        <br />
</section>







<section class="offer-container">
    <div class="offer-container--background">
        <img src="<?= base_url(); ?>img/offer-background-1.jpg" class="offer-container__bg">
    </div>
    <div class="offer-container__center">
        <p style="font-family: tahoma, sans-serif;">
            <?php 
                if (isset($layout[0]['cover_heading']))
                    echo $layout[0]['cover_heading'];
                else
                    echo 'Who said it had to be hard to find a good designer or developer?';
            ?>
        </p>
        <p style="font-family: calibri, sans-serif;">
            VS is an invite-only community where you meet top freelance designers, developers, or studios to build your next project.
        </p>
        <p id="btn_p">
            <button class="offer-container__btn btn btn-primary" id="btn_estimate">Get an Estimate</button>
        </p>
        <p style="color: grey;">
            Feel free to check an Estimated price
        </p>
    </div>
</section>

<section class="offer-body">
    <div class="container offer-body--container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Begin MailChimp Signup Form -->

<div id="mc_embed_signup">
<form action="//varunshrivastava.us12.list-manage.com/subscribe/post?u=a5d2749781d67dd9269ec57d6&amp;id=0d08391777" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
    <h2>Subscribe to our mailing list</h2>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
    <label for="mce-FNAME">First Name </label>
    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
</div>
<div class="mc-field-group">
    <label for="mce-LNAME">Last Name </label>
    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
</div>
<div class="mc-field-group">
    <label for="mce-MMERGE3">Write a friendly note to me </label>
    <textarea name="MMERGE3" class="form-control" id="mce-MMERGE3"></textarea>
</div>
       <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a5d2749781d67dd9269ec57d6_0d08391777" tabindex="-1" value=""></div>
    <input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="button">
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
            </div>
        </div>
    </div>
</section>

<hr />


