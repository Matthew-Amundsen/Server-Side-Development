			<?php
				$errors = $newcomment->errors;
			?>

				<div class="row">
					<div class="col-xs-11">
					<div class="well">
						<h3><?= $thread->title ?></h3>
						<hr>
						<br>
						<div class="media-left">
							<img src="<?= $thread->user()->gravatar(48, 'monsterid') ?>" alt="">
						</div>
						<div class="media-body">
							<a href="./?page=profile&amp;id=<?= $thread->user()->id; ?>"><?= $thread->user()->username ?></a>
							<span class="pull-right"><?= date("j 'M", strtotime($thread->created)); ?></span>
							<p><?= $thread->description ?></p>
						</div>

						<br>
						<?php if(static::$auth->isAdmin()): ?>
							<form method="POST" action="./?page=thread.destroy" class="form-inline">
								<a href="./?page=thread.edit&amp;id=<?= $thread->id ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Thread</a>
								<input type="hidden" name="id" value="<?= $thread->id ?>">
								<button class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span> Delete Thread</button>
							</form>
						<?php endif; ?>
					</div>

						<br>
						<hr>

						<?php if (count($comments) > 0): ?>
						<?php $count = 0; ?>
						<?php foreach($comments as $comment): ?>
						<?php $count += 1; ?>
							<article id="comment-<?= $comment->id ?>" class="media">
								<div class="media-left">
									<img src="<?= $comment->user()->gravatar(48, 'monsterid') ?>" alt="">

									<?php if($comment->user()->role === "admin"): ?>
										<p class="text-center admin-color">Admin</p>
									<?php endif; ?>

								</div>
								<div class="media-body">
									<p class="media-heading">
										<a href="./?page=profile&amp;id=<?= $comment->user()->id; ?>"><?= $comment->user()->username ?></a>
										<span class="pull-right"><?= date("j 'M", strtotime($comment->created)); ?></span>
									</p>
									<p>
										<?= $comment->comment ?>

										<?php if($comment->poster != ""): ?>
											<p>
												<img src="./images/posters/300h/<?= $comment->poster ?>" alt="">
											</p>
										<?php endif; ?>

										<?php if(static::$auth->isAdmin()): ?>
											<p>
												<a href="./?page=comment.edit&amp;id=<?= $comment->id ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Comment</a>
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

						<h4>Add Comment to '<?= $thread->title ?>'</h4>
						<?php if (static::$auth->check()): ?>
							<form method="POST" action="./?page=comment.create" class="form-horizontal" enctype="multipart/form-data">
								<input type="hidden" name="thread_id" value="<?= $thread->id ?>">

								<div class="form-group <?php if ($errors['comment']): ?> has-error <?php endif; ?>">
									<label for="comment" class="col-sm-4 col-md-2 control-label">Comment</label>
									<div class="col-sm-8 col-md-10">
										<textarea id="comment" class="form-control" name="comment" rows="5"><?= $newcomment->comment ?></textarea>
										<div class="help-block"><?= $errors['comment']; ?></div>
									</div>
								</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
								<div class="form-group form-group-lg<?php if ($errors['poster']): ?> has-error <?php endif; ?>">
									<label for="poster" class="col-sm-4 col-md-2 control-label">Upload An Image</label>
									<div class="col-sm-5 col-md-7">
										<input id="poster" class="form-control" name="poster" type="file">
										<div class="help-block"><?= $errors['poster']; ?></div>
									</div>
								</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
										<button class="btn btn-default">
											<span class="glyphicon glyphicon-comment"></span> Add Comment
										</button>
									</div>
								</div>

							</form>
						<?php else: ?>
							<p>You need to be <a href="./?page=login">logged in</a> to add a comment.</p>
						<?php endif; ?>

					</div>
				</div>