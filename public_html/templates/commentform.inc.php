			<?php 
				$errors = $comment->errors;
				$submitAction = "./?page=comment.update";	
			?>
					
				<div class="row">
					<div class="col-xs-11">
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
								<div class="form-group form-group-lg<?php if ($errors['poster']): ?> has-error <?php endif; ?>">
									<label for="poster" class="col-sm-4 col-md-2 control-label">Upload An Image</label>
									<div class="col-sm-5 col-md-7">
										<input id="poster" class="form-control input-lg" name="poster"
										type="file">
										<div class="help-block"><?= $errors['poster']; ?></div>
									</div>
								<?php if($comment->poster != ""): ?>
									<div class="col-sm-1 col-md-1">
										<img src="./images/posters/100h/<?= $comment->poster ?>" alt="">
									</div>
									<div class="col-sm-2 col-md-2">
										<div class="checkbox">
											<label><input type="checkbox" name="remove-image" value="TRUE"> Remove Image</label>
										</div>
									</div>
								<?php else: ?>
									<div class="col-sm-3 col-md-3">
										<p><small>no poster found</small></p>
									</div>
								<?php endif; ?>
								</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
									<button class="btn btn-default">Submit Edited Comment</button>
								</div>
							</div>

						</form>
					</div>
				</div>