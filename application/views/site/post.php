<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-lg-9">
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
            
            <div class="col-md-3">
                <form role="form" class="form-inline box" action="http://varunshrivastava.in/site/searchResults" id="cse-search-box">
                  <div class="">
                    <input type="hidden" name="cx" value="partner-pub-3963876904167425:8690882599" />
                    <input type="hidden" name="cof" value="FORID:10" />
                    <input type="hidden" name="ie" value="UTF-8" />
                    <input type="text" style="width: 100%;" class="form-control" name="q" placeholder="Search anything..." />
                  </div>
                  <div class="form-group hidden">
                    <button type="submit" class="btn btn-green" name="sa">search</button>
                  </div>
                </form>
                
                <script type="text/javascript" src="http://www.google.com/jsapi"></script>
                <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
                <script type="text/javascript" src="http://www.google.com/cse/t13n?form=cse-search-box&t13n_langs=en"></script>
            </div>
        </div>

<hr>

<!-- ---------------------- MAIN CONTENT ------------------------------ -->
    <div class="row" style="background-color: #C8CBCC;">
            <div class="col-md-8 col-sm-12 col-lg-8 right-border-seperation bg-white">
                <div class="bg-white">

            <!-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"> -->
                <p itemprop="articleBody"><?= $blog[0]['content']; ?></p>

                        <?php if (isset($authorProfile[0])): ?>
                        <hr>
                    <section class="author-detail-section bg-white">
                        <p>
                        <div class="row">
                            <div class="com-md-12 col-sm-12">
                                <div class="col-md-4 col-sm-4" style="text-align: center;">
                                    <img src="<?= base_url().$authorProfile[0]['featured_image'] ?>" class="img img-responsive img-circle" alt="Author" style="height: 200px;"/>
                                </div>
                                <div class="col-md-8 col-sm-8" style="text-align: center;">
                                    <span class="author-heading">About the Author</span>
                                    <p class="author-description">
                                        <?= $authorProfile[0]['about'] ?>
                                    </p>
                                    <?php if (!empty($socialHandles)): ?>

                                        <ul class="list-inline text-center">
                                            <?php foreach ($socialHandles as $sh): ?>
                                                <li>
                                                    <a target="_blank" href="<?= $sh['website'].$sh['handle_username'] ?>">
                                                    <span class="fa-stack fa-lg">
                                                        <i class="fa fa-circle fa-stack-2x"></i>
                                                        <i class="fa fa-<?= $sh['icon'] ?> fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>

                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>
                        </p>
                    </section>

                    <?php endif; ?>

                </div>
            </div>
            <!-- -------//------- -->
            <!-- -------- RIGHT COLUMN - 3rd --------- -->
            <div class="col-md-4 col-lg-4 bg-white"> 
                <!-- Section #1 -->
                <div class="right-section row">
                    <div class="section">
                        <div class="section__header">
                            
                        </div>
                        <div class="section__body">
                            <!-- Begin MailChimp Signup Form -->
                            <style type="text/css">
                                #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;}
                                /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                            </style>
                            <div id="mc_embed_signup">
                            <form action="//varunshrivastava.us12.list-manage.com/subscribe/post?u=a5d2749781d67dd9269ec57d6&amp;id=ffd926e444" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                <label for="mce-EMAIL">Get the latest posts sent to your e-mail directly so you can interact with our community.</label>
                                <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="email address" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a5d2749781d67dd9269ec57d6_ffd926e444" tabindex="-1" value=""></div>
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="subscribe-btn"></div>
                                </div>
                            </form>
                            </div>

                            <!--End mc_embed_signup-->
                        </div>
                        <div class="section__footer"></div>
                    </div>

                    <!-- //Section #1// -->

                    <!-- Section #2 -->
                <div class="right-section row">
                    <div class="section">
                        
                        <div class="section__header">
                            <label>Page Stats</label>
                        </div>
                        <div class="section__body">
                            <span class="box small-heading">Unique Page Views: </span><span><?= $blog_views[0]['views']; ?></span>
                            <br>
                            <span class="small-heading box">
                                Posted by: </span><span><?= $blog[0]['author']; ?>
                            </span>
                            <br>
                            <span class="small-heading box">
                                Date: </span><span><?= $blog[0]['posted_on']; ?>
                            </span>
                            <br>
                            <span class="small-heading box">
                                JSON link: </span><span><a style="color: darkblue; font-size: smaller;" href="<?= base_url(); ?>site/getBlog/<?= $blog[0]['id']; ?>"><?= base_url(); ?>site/getBlog/<?= $blog[0]['id']; ?></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="right-section row">
                    <div class="section">
                        <div class="section__header">
                            <label>Categories</label>
                        </div>
                        <div class="section__body">
                            <?php if(isset($categories)): ?>
                                   
                                <?php foreach ($categories as $c): ?>
                                <a class="box small-heading" href="<?= base_url(); ?>index.php/site/category/<?= $c['id'].'/'.$c['name']; ?>">
                                        <?= $c['name']; ?>
                                        (<?= $c['total']; ?>)
                                </a>
                                <br>
                                <?php endforeach; ?>
                                        
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Advertisers Sign-up -->
                <div class="right-section row">
                    <div class="section">
                        <div class="section__header">
                            <label>Advertisers</label>
                        </div>
                        <div class="section__body">
                            <div id="mc_embed_signup">
                            <form action="//varunshrivastava.us12.list-manage.com/subscribe/post?u=a5d2749781d67dd9269ec57d6&amp;id=767e77441c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                <label for="mce-EMAIL">Interested In Advertising With Us! Please Subscribe to our advertisers list</label>
                                <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="email address" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a5d2749781d67dd9269ec57d6_ffd926e444" tabindex="-1" value=""></div>
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="subscribe-btn"></div>
                                </div>
                            </form>

                            
                        </div>
                    </div>
                </div>

                <div class="right-section row">
                    <div class="section">
                        <div class="section__header">
                            <label>Tags</label>
                        </div>
                        <div class="section__body">
                            <?php foreach ($tags as $t): ?>
                            <a href="<?= base_url().'index.php/site/search/'.substr($t['tag'], 1) ?>" id="tags"><label class="label label-primary box"><?= $t['tag']; ?></label></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                </div>

            </div>

    </div>
        <hr>

        <!-- ---------------------- SOCIAL PLUGINS ---------------- -->
        <div class="container">
    <div class="row">
            <div class="col-md-8 col-sm-12 col-lg-8">
                
                <div class="social box">
                    <div class="fb-like" 
                         data-href="<?= $uri; ?>" 
                         data-layout="standard" 
                         data-action="like" 
                         data-show-faces="true" 
                         data-share="true">
                    </div>

                    <!-- G Plus Button -->
                    <g:plusone class="gplus"></g:plusone>
                    <!-- G-Plus Follow Button -->
                    <div class="g-follow gplus" data-annotation="bubble" data-height="20" data-href="//plus.google.com/u/0/+Varunshrivastava007" data-rel="author"></div>
                    
                    <!-- Twitter Button -->
                    <a href="https://twitter.com/share" class="twitter-share-button twit" data-related="vs_shrivastava" data-hashtags="vsproductions">Tweet</a>
                    <a href="https://twitter.com/vs_shrivastava" class="twitter-follow-button twit" data-show-count="false">Follow @vs_shrivastava</a>
                    

                    <!-- Linked In -->
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                    <script type="IN/Share" data-url="<?= $uri; ?>" data-counter="right"></script>
                    

                    <!-- Reddit -->
                    <script type="text/javascript">
                      reddit_url = "<?= $uri; ?>";
                      reddit_title = "<?= $blog[0]['heading']; ?>";
                      reddit_bgcolor = "white";
                      reddit_bordercolor = "00F";
                    </script>
                    <script type="text/javascript" src="//www.redditstatic.com/button/button3.js"></script>

                    				
					
                </div>
            </div>
        <noscript>Please enable JavaScript to view the <a href="http://www.varunshrivastava.in/?ref_noscript" rel="nofollow">VSProductions</a></noscript>
        </div>
    </div>

        <hr>



        <!-- ----------- RECENT POSTS ----------------------- -->
        <div class="container bg-white">
        <div class="row">
            <?php if(isset($recentPosts[0])): ?>    
                <div class="col-md-12" style="margin-top: 10px;margin-bottom:10px;">
                    <span class="heading"><strong style="color: crimson;">Latest</strong> Posts</span>
                </div>
                    <!-- ---- Single Blog View Section -->
                        <?php 

                            foreach ($recentPosts as $rp):
                                $slug = null;
                                if (! empty($rp['slug'])) {
                                    $slug = $rp['slug'];
                                }else {
                                    $slug = url_title($rp['heading']);
                                }
                                $blogUrl = base_url().'site/blog/'.$rp['id'].'/'.$slug;

                                # Fetching the image name without extension
                                $coverImageSegments = explode('/', $rp['cover_image']);
                                $fileNameWithoutExt = $coverImageSegments[ count ($coverImageSegments) - 1];
                                $fileNameSegments = explode('.', $fileNameWithoutExt);
                                $fileName = $fileNameSegments [ count($fileNameSegments) - 2 ];
                                $url = $rp['cover_image_dir'].'thumbs/'.$fileName.'_thumb.jpg';
                                if (! @getimagesize($url)){
                                    $url = $rp['cover_image'];
                                }

                        ?>
                        <div class="col-md-3">
                            <div class="card medium">
                                <div class="card-image">
                                  <img src="<?= $url; ?>" style="height: 200px;">
                                  <span class="card-title"><?= $rp['heading']; ?></span>
                                </div>
                                <div class="card-content">
                                  <p class="card-title--summary"><?= substr($rp['summary'], 0, 140).'...'; ?></p>
                                </div>
                                <div class="card-action">
                                  <a href="<?= $blogUrl; ?>">Read...</a>
                                </div>
                              </div>

                        </div>
                        <?php endforeach; ?>                   

                    <?php endif; ?>
        </div>
    </div>

        <!-- ------ MOST VIEWED -------- -->
    <div class="container bg-white">
        <div class="row">
            <?php if (isset($mostViewed[0])): ?>

            <div class="col-md-12" style="margin-top: 10px;margin-bottom:10px;">
                <span class="heading"><strong style="color: crimson;">Trending</strong> Posts</span>
            </div>
            
                    <?php foreach ($mostViewed as $mv): ?>
                        <?php 
                            $slug = null;
                            if (! empty($mv['slug']))
                                $slug = $mv['slug'];
                            else
                                $slug = url_title($mv['heading']);

                            $blogUrl = base_url().'site/blog/'.$mv['id'].'/'.$slug;
                        # Fetching the image name without extension
                        $coverImageSegments = explode('/', $mv['cover_image']);
                        $fileNameWithoutExt = $coverImageSegments[ count ($coverImageSegments) - 1];
                        $fileNameSegments = explode('.', $fileNameWithoutExt);
                        $fileName = $fileNameSegments [ count($fileNameSegments) - 2 ];
                        $url = $mv['cover_image_dir'].'thumbs/'.$fileName.'_thumb.jpg';
                        if (! @getimagesize($url)){
                            $url = $mv['cover_image'];
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="card medium">
                                <div class="card-image">
                                  <img src="<?= $url; ?>" style="height: 200px;">
                                  <span class="card-title"><?= $mv['heading']; ?></span>
                                </div>
                                <div class="card-content">
                                  <p class="card-title--summary"><?= substr($mv['summary'], 0, 140).'...'; ?></p>
                                </div>
                                <div class="card-action">
                                  <a href="<?= $blogUrl; ?>">Read...</a>
                                </div>
                              </div>

                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>
        </div>
    </div>

<hr>
        <!-- ------------- DISQUS COMMENT PLUGIN ---------- -->
    <div class="container bg-white">
        <div class="row" >
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
    </div> <!-- /.container -->
</article>


<hr>