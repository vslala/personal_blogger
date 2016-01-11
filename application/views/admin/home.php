<div class="container">  
    <div class="row first-row">
        <div class="col-md-12">
            <?php if(isset($blogs)): ?>
                <?php foreach($blogs as $b): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label><a target="_blank" href="http://www.varunshrivastava.in/site/blog/<?= $b['id']; ?>/<?= url_title($b['heading']); ?>"><?= $b['heading']; ?></a></label>
                    <div class="deleteLink pull-right small">
                        <a href="<?= site_url('admin/delete'.'/'.$b['id']); ?>" class="btn btn-danger btn-sm">delete </a> 
                    </div> 
                    <div class="editLink pull-right small">
                        <a href="<?= site_url('admin/edit'.'/'.$b['id'].'/'.url_title($b['heading']).'/'.$b['sort']); ?>" class="btn btn-warning btn-sm">edit</a> &nbsp; | &nbsp;
                    </div>                 
                    <div class="help-block small">Created At: <?= $b['created_at']; ?></div>
                    <div class="pull-left">
                        <div class="badge"><?= $b['sort']; ?></div>
                    </div>                   
 
                </div>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
</div>
