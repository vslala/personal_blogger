<div class="container bg-white">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php foreach ($blogs as $b): ?>
            <div class="list-group">
                <a href="<?= base_url(); ?>index.php/site/blog/<?= $b['id'].'/'.url_title($b['heading']); ?>" class="list-group-item">
                        <h4 class="list-group-item-heading"><?= $b['heading']; ?></h4>
                        <p class="list-group-item-text"><?= substr($b['content'], 0, 250).'...'; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

