<!-- Footer -->
    <footer>
        <div class="container">
            <?php if(isset($categories)): ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <label>Categories: </label>
                    <?php foreach ($categories as $c): ?>
                    <a href="<?= base_url(); ?>index.php/site/category/<?= $c['id'].'/'.$c['name']; ?>">
                        <label class="label label-info" id="tags">
                            <?= $c['name']; ?>
                            <div class="badge"><?= $c['total']; ?></div>
                        </label>
                    </a>
                    <?php endforeach; ?>
                    </center>
                </div>
            </div>
            <br>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a target="_blank" href="https://twitter.com/vs_shrivastava">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/varun.shrivastava.3">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.github.com/vslala">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://in.linkedin.com/in/shrivastavavarun">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Made by Varun Shrivastava</p>
                </div>
            </div>
        </div>
    </footer>  

    <?php if (! empty($scripts)): ?>
            <?php foreach ($scripts as $s): ?>
                <script type="text/javascript" src="<?= $s; ?>"></script>
            <?php endforeach; ?>
        <?php endif ?>
    <!-- Custom Javascript -->
    <script src="<?= base_url(); ?>js/myjs_user.js"></script> 
   
    <!-- jQuery -->
    <script src="<?= base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url(); ?>js/clean-blog.min.js"></script>
    
    <!--<script src="<?php // base_url(); ?>js/clean-blog.js"></script>-->
    <!-- Mail Chimp -->
    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us12.list-manage.com","uuid":"a5d2749781d67dd9269ec57d6","lid":"ffd926e444"}) })</script>
	<!-- Addthis.com -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5602e51aa49bea5b" async="async"></script>
</body>

</html>
