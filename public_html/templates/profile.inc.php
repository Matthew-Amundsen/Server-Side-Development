				<div class="row">
					<div class="col-xs-12">

						<div class="media-left">
							<img src="images/placeholder-avatar-sm.jpg" alt="">
							<p class="text-center"><?= ucfirst(static::$auth->user()->role); ?></p>
						</div>
						<div class="media-body">
							<h1><?= static::$auth->user()->username; ?></h1>
						</div>
						<hr>
						<div>
							<?php if (count($comments) > 0): ?>
							<?php $count = 0; ?>
							<?php foreach($comments as $comment): ?>
							<?php $count += 1; ?>
								<article id="comment-<?= $comment->id ?>" class="media">
									<div class="media-left">
										<img src="images/placeholder-avatar-sm.jpg" alt="">
										<p class="text-center"><?= ucfirst($comment->user()->role); ?></p>
									</div>
									<div class="media-body">
										<p class="media-heading"><?= $comment->user()->username ?> : <?= date("M 'j", strtotime($comment->created)); ?></p>
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
						</div>
					</div>
				</div>