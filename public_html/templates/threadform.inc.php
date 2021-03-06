			<?php 
				$errors = $thread->errors;
				$verb = ($thread->id ? "Edit" : "Create");
				if ($thread->id) {
					$submitAction = "./?page=thread.update";
				} else {
					$submitAction = "./?page=thread.store";
				}
			?>

				<div class="row">
					<div class="col-xs-11">
							<form method="POST" action="<?= $submitAction ?>" class="form-horizontal" enctype="multipart/form-data">
							<?php if($thread->id): ?>
								<input type="hidden" name="id" value="<?= $thread->id ?>">
							<?php endif; ?>
							
							<h1><?= $verb ?> Thread</h1>

								<div class="form-group <?php if ($errors['title']): ?> has-error <?php endif; ?>">
									<label for="title" class="col-sm-4 col-md-2 control-label">Thread Title</label>
									<div class="col-sm-8 col-md-10">
										<input id="title" class="form-control" name="title" placeholder="Thread Title" value="<?= $thread->title; ?>">
										<div class="help-block"><?= $errors['title']; ?>
										</div>
									</div>
								</div>

								<div class="form-group <?php if ($errors['description']): ?> has-error <?php endif; ?>">
									<label for="description" class="col-sm-4 col-md-2  control-label">Description</label>
									<div class="col-sm-8 col-md-10">
										<textarea id="description" class="form-control" name="description" rows="5" placeholder="Thread Content"><?= $thread->description; ?></textarea>
										<div class="help-block"><?= $errors['description']; ?>
										</div>
									</div>
								</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
										<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> <?= $verb ?> Thread</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>