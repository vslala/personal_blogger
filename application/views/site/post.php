<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="fb-like" 
                         data-href="<?= $uri; ?>" 
                         data-layout="standard" 
                         data-action="like" 
                         data-show-faces="true" 
                         data-share="false"
                         >
                    </div>
                    <g:plusone></g:plusone>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-related="vs_shrivastava" data-hashtags="vsproductions">Tweet</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-10 col-lg-8">
                <div class="">

            <!-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> -->
                <p itemprop="articleBody"><?= $blog[0]['content']; ?></p>
                <p>
                    <?php if(! empty($related_blogs)): ?>
                    <hr />
                    <label style="font-size: 14px;">Related Blogs: </label>
                    <?php foreach ($related_blogs as $rb): ?>
                    <a style="font-size: 12px;color: darkbrown;" 
                    class="related_blogs_link" 
                    href="<?= base_url(); ?>index.php/site/blog/<?= $rb[0]['id']; ?>/<?= url_title($rb[0]['heading']); ?>"
                    >
                        <?= $rb[0]['heading']; ?> &nbsp; | &nbsp;
                    </a>
                    <?php endforeach; ?>
                    <span class="glyphicon glyphicon-menu-right"></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-2">
                
                <!-- Most Viewed Blogs -->
                <!-- <div class="container"> -->
                    <?php if (isset($mostViewed[0])): ?>
                    <center><h3><u><i>Most Viewed</i></u></h3></center>
                        <?php foreach ($mostViewed as $mv): ?>
                            <?php 
                                $slug = null;
                                if (! empty($mv['slug']))
                                    $slug = $mv['slug'];
                                else
                                    $slug = url_title($mv['heading']);

                                $blogUrl = base_url().'site/blog/'.$mv['id'].'/'.$slug
                            ?>
                        <a href="<?= $blogUrl; ?>" class="most-viewed-anchor">
                        <div class="row" style="border-left: 1px solid lightgrey;">
                            <div class="col-md-12" style="width: 300px;">
                                <div class="most-viewed-blogs">
                                    <img src="<?= $mv['cover_image']; ?>" class="img img-responsive thumbnail" width="300px"/>
                                    <?= $mv['heading']; ?>
                                    <hr />
                                </div>
                            </div>
                        </div>
                        </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <!-- </div> -->

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- MyAdsenseAd -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-3963876904167425"
                         data-ad-slot="6497229790"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="box">
                    <strong>Tags:</strong> 
                    <?php foreach ($tags as $t): ?>
                    <a href="<?= base_url().'index.php/site/search/'.substr($t['tag'], 1) ?>" id="tags"><label class="label label-primary"><?= $t['tag']; ?></label></a>
                    <?php endforeach; ?>
                </div>
                <div class="pull-left box">Total Blog Views: <?= $blog_views[0]['views']; ?></div>
                <div class="pull-left box">
                    <div class="fb-like" 
                         data-href="<?= $uri; ?>" 
                         data-layout="standard" 
                         data-action="like" 
                         data-show-faces="true" 
                         data-share="true">
                    </div>
				
					<br />
					<br />
                    <g:plusone></g:plusone>
                    <div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/u/0/+Varunshrivastava007" data-rel="author"></div>
                    <br />
					<br />
                    <a href="https://twitter.com/share" class="twitter-share-button" data-related="vs_shrivastava" data-hashtags="vsproductions">Tweet</a>
                    <a href="https://twitter.com/vs_shrivastava" class="twitter-follow-button" data-show-count="false">Follow @vs_shrivastava</a>
                    <br />
					<br />
                    <div class="form-group">
                        <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                        <script type="IN/Share" data-url="<?= $uri; ?>" data-counter="right"></script>
                        <script type="text/javascript">
                          reddit_url = "<?= $uri; ?>";
                          reddit_title = "<?= $blog[0]['heading']; ?>";
                          reddit_bgcolor = "white";
                          reddit_bordercolor = "00F";
                        </script>
                        <script type="text/javascript" src="//www.redditstatic.com/button/button3.js"></script>
                    </div>
                    				
					
                </div>
            </div>
        <noscript>Please enable JavaScript to view the <a href="http://www.varunshrivastava.in/?ref_noscript" rel="nofollow">VSProductions</a></noscript>
            <!-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="pull-left box">
                    <div class="fb-comments" 
                    data-href="<?= $uri; ?>" 
                    data-numposts="5"
                    data-mobile="mobile"
                    data-order-by="time"></div>
                    
                </div>
            </div> -->
            <div class="row">
                <div class="comment_box">
                    <div id="disqus_thread" class="container-fluid"></div>
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES * * */
                            var disqus_shortname = 'varunshrivastava';
                            
                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
            </div>

            
        </div>
        <hr>
    </div>
    
</article>

<!--<hr>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="fb-comments" data-href="http://varunshrivastava.azurewebsites.net<?= $uri; ?>" data-numposts="5"></div>
    </div>
    <div class="col-md-3"></div>

</div>-->

<!--<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <section id="comment_section">
        <?php if(isset($comments[0])): ?>
         Comments will be shown here 
        <?php foreach($comments as $c): ?>
        <div class="form-group comment-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 username-text"><u><?= $c['username']; ?></u></div>
                    <div class="col-md-10 help-block"><span class="time">created at: <?= $c['created_at']; ?> </span></div>
                </div>
                <div class="row">
                    <div class="col-md-6 comment-text"><?= $c['comment']; ?></div>
                    <?php if(isset($_SESSION['username'])): ?>
                    <span class="time"><a href="deleteAjax.php?id=<?= $c['id']; ?>&delete=1" id="deleteComment">delete</a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
        <?php        endforeach; endif; ?>
        </section>
        <form class="form" method="post" action="postAjax.php" id="comment_form">
            <input type="hidden" value="<?= $blog[0]['id']; ?>" name="blogID" />
            <div class="panel panel-default">
                <div class="panel-heading">
                    Please share your views below...
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" placeholder="Name" id="username" name="username" required="true" class="form-control" minlength="3"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" id="comment_box" name="comment" required="true" minlength="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" name="submitComment" type="submit" >Comment</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="col-md-3"></div>
</div>-->

<hr>