<div class="container">
    <div class="row first-row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <section id="category_form">
            <center>
                <div class="page-header">
                    Blog Categories
                </div>
            <?= form_open('admin/category_add', ['class'=>'form-inline', 'id'=>'category_form']); ?>
            <input class="form-control" name="category" id="category_input" type="text" required="true" size="50"
                   placeholder="add a category and hit enter..." />
            <input class="form-control" name="sort" id="category_sort_input" type="number" step=".01" value="0"
                   placeholder="type a number and hit enter..." />
            <button type="submit" class="btn btn-primary btn-small" name="catBtn">Add</button> 
            <?= form_close(); ?>
            </center>
            </section>
            
            <center>
                <div class="page-header">
                    List of Categories
                </div>
            <section id="category_list">
                <?php foreach($categories as $c): ?>
                <?= form_open('admin/category_edit', ['id'=>'category_edit_form', 'class'=>'form-inline']); ?>
                <section id="category_labels">
                    <label class="form-label align-right box-type" style="margin-right: 8em;" id="edit_category_label"><?= $c['name']; ?></label>
                     <label class="form-label align-right box-type" id="edit_sort_label"><?= $c['sort']; ?></label>
                </section>
                <section id="edit_category_form" class="hidden">
                    <input class="form-control" id="edit_category_input" type="text" value="<?= $c['name']; ?>" name="category" />
                    <input type="hidden" name="category_id" value="<?= $c['id']; ?>" />
                    <input class="form-control" id="edit_sort_input" type="text" value="<?= $c['sort']; ?>" name="sort" />
                    <button class="btn btn-primary" type="submit">save</button>
                </section>
                <?= form_close(); ?>
                <?php endforeach; ?>
            </section>
            </center>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>