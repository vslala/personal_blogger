<!-- Main Content -->
    <!--<div class="container">-->
        <div class="row bg-white">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php if(isset($about[0])): ?>
                    <?= $about[0]['about_me']; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <button data-toggle="modal" data-target="#my_project_modal" class="btn btn-default">My Projects</button>
                <a href="<?= base_url(); ?>docs/0203CS121043_RESUME.pdf" class="btn btn-default">My Resume</a>
                <!--<a href="#" class="btn btn-default">Resume</a>
                <a href="#" class="btn btn-default">My Websites</a>-->
            </div>
            <div class="give-freedom"></div>
        </div>



        <div id="my_project_modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

    <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Projects</h4>
                    </div>
                <div class="modal-body" id="scroll_bar">
                    <?php foreach ($projects as $key => $value): $i++;?>                    
                    <ul class="nav nav-stacked project-nav <?php if($i%2==0){echo 'bg-danger'; } else{ echo 'bg-info'; } ?>" >
                        <li>
                            <span class="help-block pull-right" style="font-size: xx-small;"><?= $value['created_at']; ?></span>                       
                            <strong><a href="<?= $value['link']; ?>" style="color: blue;"><?= $value['title']; ?></a></strong>
                        </li>
                        <li><div class="pDescription"><?= $value['description']; ?></div></li>
                    </ul>
                    <div class="clear-fix"></div>
                <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
</div>
    <!--</div>-->

    <hr>
