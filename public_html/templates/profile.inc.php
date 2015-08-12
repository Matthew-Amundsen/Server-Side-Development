				<div class="row">
					<div class="col-xs-11">
						<div class="well well-sm">
							<div class="media-left">
								<br>
								<img src="<?= $user->gravatar(48, 'monsterid') ?>" alt="">
								<p class="text-center admin-color"><?= ucfirst($user->role); ?></p>
							</div>
							<div class="media-body">
								<h1><?= $user->username; ?></h1>
							</div>
						</div>

						<h4>Users History</h4>
						<hr id="divider">

						<div>
							<?php if (count($comments) > 0): ?>
							<?php $count = 0; ?>
							<?php foreach($comments as $comment): ?>
							<?php $count += 1; ?>
								<article id="comment-<?= $comment->id ?>" class="media">
									<div class="media-left">
										<img src="<?= $comment->user()->gravatar(48, 'monsterid') ?>" alt="">
									</div>
									<div class="media-body">
									
										<span><a href="./?page=thread&amp;id=<?= $comment->thread_id ?>"><?= $comment->thread()->title ?></a></span>

										<span class="pull-right"><?= date("j 'M", strtotime($comment->created)); ?></span>

										<p><?= $comment->comment ?></p>
										<?php if($comment->poster != ""): ?>
											<p><img src="./images/posters/300h/<?= $comment->poster ?>" alt=""></p>
										<?php endif; ?>
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