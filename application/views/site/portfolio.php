<div class="container">
    <?php foreach ($projects as $p): ?>
        <!-- Projects -->
        <div class="row">
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

        
    </div>