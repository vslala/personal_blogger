<div class="container">
    <div class="clear-fix"></div>
    <div class="row">
        <?php if (isset($blogs[0])): ?>
        <?php foreach ($blogs as $b): ?>

            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img style="height: 300px;" class="responsive-img" src="<?= $b['cover_image']; ?>">
                        <span class="card-title" style="background-color: rgba(0,0,0, 0.7);"><?= $b['heading']; ?></span>
                    </div>
                    <div class="card-content">
                        <p><?= substr($b['summary'], 0, 167).'...'; ?></p>
                    </div>
                    <div class="card-action">
                        <a target="_blank" href="<?= base_url(); ?>site/blog/<?= $b['id'].'/'.$b['slug']; ?>">Read More...</a>
                        <a href="<?= base_url(); ?>author/blog-edit/<?= $b['id']; ?>">Edit<a>
                        <p>Views: <span class="badge-circle"><?= $b['views']; ?></span></p>
                    </div>
            </div>
        </div>

        <?php endforeach; ?>

        <?php else: ?>

        <h4>You have not composed any blog yet... <a href="<?= base_url(); ?>author/compose">Start a blog now!</a></h4>

        <?php endif; ?>
    </div>
</div>