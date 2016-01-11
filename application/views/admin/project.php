<div class="container">
	<div class="row first-row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
                    <a href="<?= site_url('admin/create_project'); ?>" class="btn btn-success" data-target="#myModal" data-toggle="modal">Compose</a>
			<section class="show-projects">
				<div class="clear"></div>
			<?php foreach ($projects as $key => $row): ?>
				<div class="panel-default" id="parent_panel">
					<div class="panel-heading">
						<div class="pull-right">
							<span class="glyphicon glyphicon-calender"><?= $row['created_at']; ?></span>
						</div>
						<?= $row['title']; ?>
					</div>
					<div class="panel-body">
						<?= $row['description']; ?>
					</div>
					<div class="panel-footer">
                                            <a href="<?= site_url('admin/project_edit').'/'.$row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= site_url('admin/project_delete').'/'. $row['id']; ?>" id="project_delete" class="btn btn-danger btn-sm">Delete</a>
					</div>
				</div>
				<div class="clear"></div>
			<?php endforeach; ?>
		</section>
		</div>
		<div class="col-md-1"></div>
	</div>
    
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Project</h4>
      </div>
      <div class="modal-body">
        <?= form_open('admin/create_project'); ?>
					<div class="form-group">
						<label class="col-md-4 form-label">Project Title: </label>
						<div class="col-md-8">
							<input type="text" name="projectTitle" id="project_title" placeholder="Name of the project" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 form-label">Project Link: </label>
						<div class="col-md-8">
							<input type="text" name="projectLink" id="project_link" placeholder="Link for the project" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 form-label">Project Description: </label>
						<div class="col-md-8">
							<textarea name="projectDescription" maxlength="3000" id="project_description" rows="10" cols="20" class="form-control"></textarea>
						</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 form-label">Project Image: </label>
                                            <div class="col-md-8">
                                                <textarea name="projectImage" maxlength="3000" id="project_description" rows="5" cols="20" class="form-control"></textarea>
                                            </div>
                                        </div>
					<div class="form-group">
						<label class="col-md-4 form-label"></label>
						<div class="col-md-8">
							<button name="submitBtn" class="btn btn-primary" id="project_submit_btn" type="submit">Submit</button>
							<a href="showProjects.php" class="btn btn-info btn-small">show all projects</a>
						</div>
					</div>
				<?= form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

