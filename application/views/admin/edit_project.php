<div class="container">
	<div class="row first-row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<?php if(isset($flag)): ?>
				<div class="alert-success">Your Project has been updated successfully!!!</div>
			<?php endif; ?>
			<div class="project-form">
				<?php if(isset($message)): ?>
					<div class="alert-info"><strong><?= $message; ?></strong></div>
				<?php endif; ?>
				<?= form_open('admin/project_update'); ?>
					<input type="hidden" value="<?= $project[0]['id']; ?>" name="id" />
					<div class="form-group">
						<label class="col-md-4 form-label">Project Title: </label>
						<div class="col-md-8">
							<input type="text" value="<?= $project[0]['title'];  ?>" name="projectTitle" id="project_title" placeholder="Name of the project" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 form-label">Project Link: </label>
						<div class="col-md-8">
							<input type="text" value="<?= $project[0]['link'];  ?>" name="projectLink" id="project_link" placeholder="Link for the project" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 form-label">Project Description: </label>
						<div class="col-md-8">
							<textarea name="projectDescription" maxlength="3000" id="project_description" rows="10" cols="20" class="form-control"><?= $project[0]['description'];  ?></textarea>
						</div>
					</div>
                                        <div class="form-group">
						<label class="col-md-4 form-label">Project Image: </label>
						<div class="col-md-8">
							<textarea name="projectImage" maxlength="3000" id="project_description" rows="5" cols="20" class="form-control"><?= $project[0]['project_image'];  ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 form-label"></label>
						<div class="col-md-8">
							<input type="submit" name="projectSubmitBtn" class="btn btn-primary" id="project_submit_btn" value="Submit" />
                                                        <a href="<?= site_url('admin/project_update'); ?>" class="btn btn-info btn-small">show all projects</a>
						</div>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

<script>
    CKEDITOR.replace('projectDescription');
</script>
