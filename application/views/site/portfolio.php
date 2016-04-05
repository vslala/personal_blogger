<div class="container bg-white">
    <div class="row">
        <div class="switch">
            <label>List view</label>
          <input id="cmn-toggle-1" name="switch" class="cmn-toggle cmn-toggle-round" type="checkbox">
          <label for="cmn-toggle-1" id="cmn-toggle-1"></label>
        </div>
        <hr>
    </div>
    <section class="list">
        <?php foreach ($projects as $p): ?>
            <!-- Projects -->
            <div class="row animated bounceInRight">
                <div class="col-md-7">
                    <a href="<?= $p['project_image']; ?>" target="_popup">
                        <img class="img-responsive img-thumbnail" src="<?= $p['project_image']; ?>" alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3><?= $p['title']; ?></h3>
                    <div style="font-family: tahoma, sans-serif; font-size: medium;"><?= $p['description']; ?></div>
                    <a class="btn btn-primary" href="<?= $p['link']; ?>">View Project <span class="glyphicon glyphicon-link"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>
        <?php endforeach; ?>
    </section>

    <section class="blocks">
        <div class="row animated bounceInRight">
            <?php foreach($projects as $p): ?>
                <div class="col-md-6 col-sm-12">
                    <a href="<?= $p['link']; ?>" target="_blank" style="text-decoration: none;">
                        <article class="project">
                            <div class="article__body">
                                <img class="img img-responsive thumbnail" src="<?= $p['project_image']; ?>">
                            </div>
                            <div class="article__footer">
                                <span class="article__footer--text">
                                    <?= $p['title']; ?>
                                </span>
                            </div>
                        </article>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>  
    </section>
    

</div>