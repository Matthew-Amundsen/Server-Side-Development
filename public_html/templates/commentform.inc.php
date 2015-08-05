			<?php 
				$errors = $comment->errors;
				$submitAction = "./?page=comment.update";
			?>
					
				<div class="row">
					<div class="col-xs-12">
						<form method="POST" action="<?= $submitAction ?>" class="form-horizontal" enctype="multipart/form-data">
						<?php if($comment->id): ?>
							<input type="hidden" name="id" value="<?= $comment->id ?>">
						<?php endif; ?>
						
						<h1>Edit Comment</h1>

							<div class="form-group <?php if ($errors['comment']): ?> has-error <?php endif; ?>">
								<label for="comment" class="col-sm-4 col-md-2  control-label">Comment</label>
								<div class="col-sm-8 col-md-10">
									<textarea id="comment" class="form-control" name="comment" rows="5"><?= $comment->comment; ?></textarea>
									<div class="help-block"><?= $errors['comment']; ?>
									</div>
								</div>
							</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
									<button class="btn btn-xs btn-primary">Submit Edited Comment</button>
								</div>
							</div>

						</form>
					</div>
				</div>