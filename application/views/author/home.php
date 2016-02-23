<div class="pure-g">
    <div class="pure-u-md-1-3"></div>
    <div class="pure-u-md-1-3 pure-u-sm-1-1">
        <ul class="list-group">
        <?php foreach ($blogs as $blog): ?>
            <li class="list-group-item">
                <a href="<?= base_url(); ?>site/blog/<?= $blog['id']; ?>/<?= $blog['slug']; ?>">
                    <div class="blog-title"><?= $blog['heading']; ?></div>
                    <label class="small-text">Blog Views: </label><span class="badge"><?= $blog['views']; ?></span> &nbsp;|
                    <label class="small-text">Sort Order: </label><span class="badge"><?= $blog['sort']; ?></span>
                </a>
                <a href="<?= base_url(); ?>author/blog-edit/<?= $blog['id']; ?>" class="button">Update</a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
    <div class="pure-u-md-1-3"></div>
</div>