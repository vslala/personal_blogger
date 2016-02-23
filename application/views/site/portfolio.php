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

    <div class="row">
        <?php 
        $i=0; $j = (count($projects) - 1); $mid = $j/2;
        for ($c=0; $c < count($projects); $c++): 
            if (($i - $j) > 1)
                break;
        ?>

        <div class="col-md-6 col-sm-6 col-lg-4">
            <a href="">
                <div class="box">
                    <div class="box-head"><?= $projects[$i]['title']; ?></div>
                    <div class="box-body">
                        <div class="box-img">
                            <img class="img img-responsive" src="<?= $projects[$i]['project_image']; ?>">
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </a>
        </div>
        <?php
            $i++;
        ?>
        <div class="col-md-6 col-sm-6 col-lg-4">
            
            <a href="">
                <div class="box">
                    <div class="box-head"><?= $projects[$i]['title']; ?></div>
                    <div class="box-body">
                        <div class="box-img">
                            <img class="img img-responsive" src="<?= $projects[$i]['project_image']; ?>">
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </a>
        </div>
        <?php
            $j--;
        ?>
        <?php endfor; ?>
    </div>
        
</div>