<?php 
    $defaultDescription = 'Varun Shrivastava is a passionate programmer and a great learner. He always looks for opportunities to interact with new people and make new friends. This is his website where he writes about different stuffs.';
?>
<hr>
<!-- Footer --> 

    <footer class="bg-black">

        <?php 
            if (isset($footerContent)){
                include FCPATH.'application/views/layout/_footer_content.php';
            } 

        ?>

        <div class="container">
            <?php if(isset($categories)): ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <label class="header uppercase white-text">Categories: </label>
                    <?php foreach ($categories as $c): ?>
                    <a href="<?= base_url(); ?>index.php/site/category/<?= $c['id'].'/'.$c['name']; ?>">
                        <label class="label label-danger" id="tags">
                            <?= $c['name']; ?>
                            <div class="badge" style="background-color: crimson;"><?= $c['total']; ?></div>
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
                                    <!-- <i class="fa fa-circle fa-stack-2x"></i> -->
                                    <i class="fa fa-twitter-square fa-stack-2x"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/varun.shrivastava.3">
                                <span class="fa-stack fa-lg">
                                    <!-- <i class="fa fa-circle fa-stack-2x"></i> -->
                                    <i class="fa fa-facebook-square fa-stack-2x"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.github.com/vslala">
                                <span class="fa-stack fa-lg">
                                    <!-- <i class="fa fa-circle fa-stack-2x"></i> -->
                                    <i class="fa fa-github-square fa-stack-2x"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://in.linkedin.com/in/shrivastavavarun">
                                <span class="fa-stack fa-lg">
                                    <!-- <i class="fa fa-circle fa-stack-2x"></i> -->
                                    <i class="fa fa-linkedin-square fa-stack-2x"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted white-text">Copyright &copy; 2016 Made by Varun Shrivastava</p>
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
