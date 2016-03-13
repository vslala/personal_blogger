<div class="container">
    <div class="clear-fix"></div>
    <div class="row">
        <?php if (isset($blogs[0])): ?>
        <?php foreach ($blogs as $b): ?>

            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img style="height: 300px;" class="responsive-img" src="<?= $b['cover_image']; ?>">
                        <span class="card-title"><?= $b['heading']; ?></span>
                    </div>
                    <div class="card-content">
                        <p><?= substr($b['summary'], 0, 167).'...'; ?></p>
                    </div>
                    <div class="card-action">
                        <a target="_blank" href="<?= base_url(); ?>site/blog/<?= $b['id'].'/'.$b['slug']; ?>">Read More...</a>
                    </div>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>