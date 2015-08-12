				<div class="row threads">
					<div class="col-xs-11">
						<div class="well well-lg header">
							<h2>Welcome to the Fallout Forum!!</h2>
							<p>Hello and welcome to the Fallout Forum. This forum was speciallay created for the upcoming release of Fallout 4. Sign up and get posting. - Yoyo, The super cool admin</p>
						</div>

						<h3>Threads</h3>

						<?php if(static::$auth->user()): ?>
							<p>
								<a class="btn btn-default" href="./?page=thread.create">
									<span class="glyphicon glyphicon-plus"></span> Create New Thread
								</a>
							</p>
						<?php endif; ?>

							<div class="row threads-header">
								<div class="col-xs-6 col-sm-8 col-md-10">
									<p>Title</p>
								</div>
								<div class="col-xs-3 col-sm-2 col-md-1">
									<p class="text-center">Replies</p>
								</div>
								<div class="col-xs-3 col-sm-2 col-md-1">
									<p class="text-center">Created</p>
								</div>
							</div>

						<hr id="divider">
						
						<?php if (count($threads) > 0): ?>

							<?php foreach($threads as $thread): ?>
								<div class="row thread">
									<div class="col-xs-6 col-sm-8 col-md-10">
										<a href="./?page=thread&amp;id=<?= $thread->id ?>">
											<?= $thread->title; ?>
										</a>
									</div>
									<div class="col-xs-3 col-sm-2 col-md-1">
										<p class="text-center"><?= count($thread->comments()) ?></p>
									</div>
									<div class="col-xs-3 col-sm-2 col-md-1">
										<p class="text-center"><?= date("M 'j", strtotime($thread->created)) ?></p>
									</div>
								</div>
								<hr>
							<?php endforeach; ?>

						<?php else: ?>

							<p>No Threads Found. Sorry.</p>

						<?php endif; ?>
					
					</div>
				</div>