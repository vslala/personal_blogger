<div class="container">
    <div class="row first-row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="message_tabs">
                <button data-toggle="collapse" data-target="#unread_messages" class="btn btn-sm btn-primary" id="show_unread">Show Unread Messages</button>
                <button data-toggle="collapse" data-target="#read_messages" class="btn btn-sm btn-default" id="show_read">Show Read Messages</button>
            </div>
            <section class="collapse in" id="unread_messages">
            <?php foreach($unread_contacts as $contact): ?>
                <div class="list-group">
                    <a href="#" class="list-group-item" id="list_item">
                        <h4 class="list-group-item-heading"><?= $contact['name']; ?></h4>
                        <p class="list-group-item-text">My Email Address is <strong><?= $contact['email']; ?></strong> and 
                            I have the following message for you <?= $contact['message']; ?>
                        </p>
                    </a>
                </div> 
            <?php endforeach; ?>
            </section>
            
            <section class="collapse" id="read_messages">
            <?php foreach($read_contacts as $contact): ?>
            
                <div class="list-group">
                    <a href="#" class="list-group-item" id="list_item">
                        <h4 class="list-group-item-heading"><?= $contact['name']; ?></h4>
                        <p class="list-group-item-text">My Email Address is <strong><?= $contact['email']; ?></strong> and 
                            I have the following message for you <?= $contact['message']; ?>
                        </p>
                    </a>
                </div>
            
            <?php endforeach; ?>
            </section>

            <hr />
            <section>
                <div>
                    <div class="page-header">
                        <div class="h2">Customers Response</div>
                        <span class="pull-right">
                            <button data-toggle="collapse" class="btn btn-default" data-target="#customers_response_div">Show</button>
                        </span>
                    </div>
                </div>
                <div class="collapse" id="customers_response_div">
                <?php foreach($customerResponse as $customer): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <?= $customer['name']; ?>
                        <span class="pull-right">
                            <div class="help-block" style="font-size: 12px;">
                                <?= $customer['created_at']; ?>
                            </div>
                        </span>
                    </div>
                    <div class="panel-body">
                        <?= $customer['subject']; ?><p>
                        My Email Address is: <label><?= $customer['email']; ?></label><br />
                        My Occupation is: <label><?= $customer['occupation']; ?></label><br />
                        Call me at: <label><?= $customer['telephone']; ?></label>
                    </div>
                </div>
            <?php endforeach; ?>
                <div>
            </section>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>