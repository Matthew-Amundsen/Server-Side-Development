			<?php 
				$errors = $movie->errors;
				$verb = ($movie->id ? "Submit Edited" : "Add");
				if ($movie->id) {
					$submitAction = "./?page=movie.update";
				} else {
					$submitAction = "./?page=movie.store";
				}
			?>

				<div class="col-xs-10">
					
					<div class="row">
						<div class="col-xs-12">
							<form method="POST" action="<?= $submitAction ?>" class="form-horizontal" enctype="multipart/form-data">
							<?php if($movie->id): ?>
								<input type="hidden" name="id" value="<?= $movie->id ?>">
							<?php endif; ?>
							
							<h1><?= $verb ?> A Movie</h1>

								<div class="form-group <?php if ($errors['title']): ?> has-error <?php endif; ?>">
									<label for="title" class="col-sm-4 col-md-2 control-label">Movie Title</label>
									<div class="col-sm-8 col-md-10">
										<input id="title" class="form-control" name="title" placeholder="Movie Title" value="<?= $movie->title; ?>">
										<div class="help-block"><?= $errors['title']; ?>
										</div>
									</div>
								</div>

								<div class="form-group <?php if ($errors['year']): ?> has-error <?php endif; ?>">
									<label for="year" class="col-sm-4 col-md-2  control-label">Release Year</label>
									<div class="col-sm-8 col-md-10">
										<input id="year" class="form-control" name="year" size="5" placeholder="Year Released (yyyy)" value="<?= $movie->year; ?>">
										<div class="help-block"><?= $errors['year']; ?>
										</div>
									</div>
								</div>

								<div class="form-group <?php if ($errors['description']): ?> has-error <?php endif; ?>">
									<label for="description" class="col-sm-4 col-md-2  control-label">Description</label>
									<div class="col-sm-8 col-md-10">
										<textarea id="description" class="form-control" name="description" rows="5" placeholder="Movie Description"><?= $movie->description; ?></textarea>
										<div class="help-block"><?= $errors['description']; ?>
										</div>
									</div>
								</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
								<div class="form-group form-group-lg<?php if ($errors['poster']): ?> has-error <?php endif; ?>">
									<label for="poster" class="col-sm-4 col-md-2 control-label">Poster Image</label>
									<div class="col-sm-5 col-md-7">
										<input id="poster" class="form-control input-lg" name="poster"
										type="file">
										<div class="help-block"><?= $errors['poster']; ?></div>
									</div>
								<?php if($movie->poster != ""): ?>
									<div class="col-sm-1 col-md-1">
										<img src="./images/posters/100h/<?= $movie->poster ?>" alt="">
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
										<button class="btn btn-warning">
											<span class="glyphicon glyphicon-wrench"></span> <?= $verb ?> Movie
										</button>
									</div>
								</div>

							</form>

							<?php if ($movie->id): ?>
								<form method="POST" action="./?page=movie.destroy" class="form-horizontal">
									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
											<input type="hidden" name="id" value="<?= $movie->id ?>">
											<button class="btn btn-danger">
												<span class="glyphicon glyphicon-trash"></span> Delete Movie
											</button>
										</div>
									</div>
								</form>
							<?php endif; ?>

						</div>
					</div>
				</div>