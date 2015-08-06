				<div class="row">
					<div class="col-xs-12">

						<div class="media-left">
							<img src="images/placeholder-avatar-sm.jpg" alt="">
							<p class="text-center"><?= ucfirst($user->role); ?></p>
						</div>
						<div class="media-body">
							<h1><?= $user->username; ?></h1>
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
										<p class="text-center"><?= ucfirst($user->role); ?></p>
									</div>
									<div class="media-body">
									
										<span><?= $comment->user()->username ?></span>
To replace the above line////////////	<span><a href="./?page=movie&amp;id=<?= $movie->id ?>"><?= $movie->title; ?></a></span>		//////////// Not Working ////

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