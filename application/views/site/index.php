<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?= form_open('site/search'); ?>
            <input type="text" placeholder="Type the keywords and hit enter..." name="search" class="form-control small" required=""/>
            <?= form_close(); ?>
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
