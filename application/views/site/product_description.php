<div class="container bg-white">
	<div class="row first-row">		
		<div id='cover_carousel' class="carousel slide" data-ride="carousel" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
        <?php for($i=0; $i<$iterate; $i++): ?>
				<li data-target="#cover_carousel" data-slide-to="<?= $i; ?>" class="<?php if($i==0){echo 'active';} ?>"></li>
        <?php endfor; ?>
			</ol>

			<!-- Wrapper for slides -->
			
  			<div class="carousel-inner" role="listbox">
          <?php foreach ($product_images as $img): $count++;?>
    			<div class="item <?php if($count==1){echo 'active';} ?>">
      				<img src="<?= $img['src']; ?>" alt="<?= $img['name']; ?>">
      				<div class="carousel-caption">
        				<h3 style="background-color: rgba(0,0,0,0.5)"><?= $img['name']; ?></h3>
        				<p style="background-color: rgba(0,0,0,0.5)"><?= $img['caption']; ?></p>
      				</div>
    			</div>
          <?php endforeach; ?>
			</div>
			

			<!-- Left and right controls -->
  			<a class="left carousel-control" href="#cover_carousel" role="button" data-slide="prev">
    			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
  			</a>
  			<a class="right carousel-control" href="#cover_carousel" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  			</a>
		</div>
	</div>

	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php foreach ($products as $prod): ?>
            <h1><?= $prod['tag_line']; ?></h1>
            <h4><?= $prod['title']; ?></h4>
            <p><?= $prod['description']; ?></p>
            <?php endforeach; ?>
            <br />
            <hr />
            <div class="fb-like" data-href="<?= $uri; ?>" data-layout="standard" data-action="recommend" data-show-faces="true" data-share="true"></div>
            <div class="g-plusone" data-annotation="inline" data-width="300"></div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-md-12 col-sm-18">
            <div class="fb-comments" 
                    data-href="<?= $uri; ?>" 
                    data-numposts="5"
                    data-mobile="mobile"
                    data-order-by="time">
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="section form-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2>You just have to fill the form below <img alt="yes" src="http://cdn.ckeditor.com/4.5.1/full/plugins/smiley/images/thumbs_up.png" style="height:23px; width:23px" title="yes" /></h2>
            </div>
            <?= form_open('site/product_contact', ['role'=>'form', 'class'=>'form-horizontal', 'id'=>'customer_contact_form']); ?>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Name</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name='name'; class="form-control" placeholder="Enter your full name">
                </div>
              </div>
              <div class="form-group" id="occupation">
                <div class="col-sm-2">
                  <label class="control-label">Occupation</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name='occupation' class="form-control" placeholder="What do you do... ">
                </div>
              </div>
              <div class="form-group" id="email">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" name='email' class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group" id="telephone">
                <div class="col-sm-2">
                  <label class="control-label">Telephone</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name='telephone' class="form-control" placeholder="Your 24x7 contact number...">
                </div>
              </div>
              <div class="form-group" id="subject">
                <div class="col-sm-2">
                  <label class="control-label">Subject</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" name='subject'></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" id="submitBtnDiv">
                  <button type="submit" class="btn btn-primary" name='submitBtn' id="submitBtn">Send</button>
                </div>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>


</div>
<hr />