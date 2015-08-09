				<div class="row">
					<div class="col-xs-11">

						<div class="media-left">
							<img src="images/placeholder-avatar-sm.jpg" alt="">
							<p class="text-center"><?= ucfirst($user->role); ?></p>
						</div>
						<div class="media-body">
							<h1><?= $user->username; ?></h1>
						</div>
						
						<hr id="divider">

						<div>
							<?php if (count($comments) > 0): ?>
							<?php $count = 0; ?>
							<?php foreach($comments as $comment): ?>
							<?php $count += 1; ?>
								<article id="comment-<?= $comment->id ?>" class="media">
									<div class="media-left">
										<img src="images/placeholder-avatar-sm.jpg" alt="">
										<p class="text-center"><?= ucfirst($user->role); ?></p>
									</div>
									<div class="media-body">
									
										<span><a href="./?page=movie&amp;id=<?= $comment->movie_id ?>"><?= $comment->movie()->title ?></a></span>

										<span class="pull-right"><?= date("M 'j", strtotime($comment->created)); ?></span>

										<p><?= $comment->comment ?></p>
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