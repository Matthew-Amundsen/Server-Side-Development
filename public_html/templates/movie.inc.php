			<?php
				$errors = $newcomment->errors;
			?>

				<div class="col-xs-10">

					<h1><?= $movie->title ?></h1>

					<p><?= $movie->description ?></p>

					<?php if(static::$auth->isAdmin()): ?>
						<p>
							<a href="./?page=movie.edit&amp;id=<?= $movie->id ?>" class="btn btn-sm btn-primary">Edit Movie</a>
						</p>
					<?php endif; ?>

					<h3>Comments</h3>
						<?php if (count($comments) > 0): ?>
						<?php $count = 0; ?>
						<?php foreach($comments as $comment): ?>
						<?php $count += 1; ?>
							<article id="comment-<?= $comment->id ?>" class="media">
								<div class="media-left">
									<img src="images/placeholder-avatar-sm.jpg" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading"><?= $comment->user()->username ?> <?= date("M 'j", strtotime($comment->created)); ?></h4>
									<p>
										<?= $comment->comment ?>

										<?php if(static::$auth->isAdmin()): ?>
											<p>
												<a href="./?page=comment.edit&amp;id=<?= $comment->id ?>" class="btn btn-xs btn-default">Edit Comment</a>
											</p>
										<?php endif; ?>
									</p>
								</div>
							</article>
							<hr>
						<?php endforeach; ?>
						<?php else: ?>
							<p>No comments. Yet…</p>
						<?php endif; ?>

					<h3>Add Comment to '<?= $movie->title ?>'</h3>
					<?php if (static::$auth->check()): ?>
						<form method="POST" action="./?page=comment.create" class="form-horizontal">
							<input type="hidden" name="movie_id" value="<?= $movie->id ?>">

							<div class="form-group <?php if ($errors['comment']): ?> has-error <?php endif; ?>">
								<label for="comment" class="col-sm-4 col-md-2 control-label">Comment</label>
								<div class="col-sm-8 col-md-10">
									<textarea id="comment" class="form-control" name="comment" rows="5"><?= $newcomment->comment ?></textarea>
									<div class="help-block"><?= $errors['comment']; ?></div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
									<button class="btn btn-success">
										<span class="glyphicon glyphicon-ok"></span> Add Comment
									</button>
								</div>
							</div>
						</form>
					<?php else: ?>
						<p>You need to be <a href="./?page=login">logged in</a> to add a comment.</p>
					<?php endif; ?>

				</div>