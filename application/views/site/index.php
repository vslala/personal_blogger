<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <form role="form" class="form-inline" action="http://www.varunshrivastava.in/site/searchResults" id="cse-search-box">
      <div class="">
        <input type="hidden" name="cx" value="partner-pub-3963876904167425:8690882599" />
        <input type="hidden" name="cof" value="FORID:10" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" style="width: 100%;" class="form-control" name="q" placeholder="Type anything and hit enter..." />
      </div>
      <div class="form-group hidden">
        <button type="submit" class="btn btn-green" name="sa">search</button>
      </div>
    </form>
    <hr />
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script>
    <script type="text/javascript" src="http://www.google.com/cse/t13n?form=cse-search-box&t13n_langs=en"></script>
            <?php if (isset($blogs)): ?>
                <?php foreach ($blogs as $b): ?>
                    <div class="post-preview">
                        <a href="<?= site_url('site/blog').'/'.$b['id'].'/'.  url_title($b['heading']); ?>">
                            <h2 class="post-title">
                                <?= $b['heading']; ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo substr($b['content'], 0, 200).'...'; ?> 
                            </h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#"><?= $b['author']; ?></a> on 
                            <?php 
                                if (isset($b['posted_on'])) 
                                    echo $b['posted_on'];
                                else
                                    echo $b['created_at']; 
                            ?>
                        </p>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <hr>
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="<?php if(isset($count)){ echo site_url('site/index/'.$count); } else { echo site_url('site/index/'. 0); } ?>">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
		
    </div>
</div>
