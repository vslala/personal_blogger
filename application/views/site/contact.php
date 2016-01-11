    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="contact_div">
                <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <?= form_open('site/save_contact', ['id'=>'contact_form']); ?>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" name="message" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-6">
                <a href="https://www.google.com/maps/d/edit?mid=zLSElJdFKt8U.kQj90gSeQZG8&usp=sharing" target="_blank">
                    <img class="img img-thumbnail" src="<?= base_url(); ?>img/my_location.png" />
                </a>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Facebook Badge START -->
                        <a href="https://www.facebook.com/varun.shrivastava.3" 
                           title="Varun Shrivastava" 
                           style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">
                            Varun Shrivastava
                        </a>
                        <br />
                        <a href="https://www.facebook.com/varun.shrivastava.3" 
                           title="Varun Shrivastava" target="_TOP">
                            <img class="img" src="https://badge.facebook.com/badge/100001812088374.1812.1772161707.png" 
                                 style="border: 0px;" alt="" /></a>
                        <br />
                        <a href="https://www.facebook.com/badges/" 
                           title="Make your own badge!" 
                           style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" 
                           target="_TOP">
                            Varun Shrivastava
                        </a>
                        <!-- Facebook Badge END -->
                    </div>
                    <div class="col-sm-6">
                        <a class="twitter-timeline" href="https://twitter.com/vs_shrivastava" data-widget-id="633523737631916032">Tweets by @vs_shrivastava</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                    </div>
                </div>
               <!--  <div class="row">
                    <iframe src='http://ape-project.org/demos/chat/demo.html' style='width: 867px; height: 500px; border:none'></iframe>
                </div> -->

            </div>
        </div>
    </div>

    <hr>
