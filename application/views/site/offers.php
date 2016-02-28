<div class="container">
    <div class="row first-row"></div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        
        <?php if (isset($offer[0])): ?>
        <section>
            <header>
                <h2><?= $offer[0]['heading']; ?></h2>
                <span class="helper">#<?= $offer[0]['offer_id']; ?></span><br/>
                <span class="helper">Offer End-date: <?= $offer[0]['end_date']; ?></span>
            </header>
            <article>
                <?= $offer[0]['content']; ?>
            </article>
        </section>
        <div class="contact-form">
                <p>You cannot say no to this offer... Contact me ASAP!</p>
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

        <?php elseif (isset($offers[0])): ?>

        <div class="display-offers-list">
            <ul class="list-group">
            <?php foreach ($offers as $offer): ?>

            <a href="<?= base_url(); ?>offer/<?= $offer['offer_id']; ?>">
            <li class="list-group-item">
                <div class="list-title">
                    <?= $offer['heading'];?>
                </div>
                <div class="list-side-content">
                    <span class="help-block small">#<?= $offer['offer_id']; ?></span>
                    <span class="help-block small">End Date: <?= $offer['end_date']; ?></span>
                </div>
            </li>
            </a>

            <?php endforeach; ?>
            </ul>
        </div>

        <?php else: ?>

        <h2>There are no offers available at the moment. Please visit later... </h2>  

        <?php endif; ?>
        
        </div>
        <div class="col-md-2"></div>
    </div>  
</div>
<hr />