				<div class="row threads">
					<div class="col-xs-11">

						<?php if (count($movies) > 0): ?>
						
							<h3>Threads</h3>

							<?php if(static::$auth->user()): ?>
								<p>
									<a class="btn btn-default" href="./?page=movie.create">
										<span class="glyphicon glyphicon-plus"></span> Create New Thread
									</a>
								</p>
							<?php endif; ?>

								<div class="row threads-header">
									<div class="col-xs-10">
										<p>Title</p>
									</div>
									<div class="col-xs-1">
										<p>Replies</p>
									</div>
									<div class="col-xs-1">
										<p>Created</p>
									</div>
								</div>

							<hr id="divider">

							<?php foreach($movies as $movie): ?>
								<div class="row thread">
									<div class="col-xs-10">
										<a href="./?page=movie&amp;id=<?= $movie->id ?>">
											<?= $movie->title; ?>
										</a>
									</div>
									<div class="col-xs-1">
										<p><?= "####" ?></p>
									</div>
									<div class="col-xs-1">
										<p><?= date("M 'j", strtotime($movie->created)) ?></p>
									</div>
								</div>
								<hr>
							<?php endforeach; ?>

						<?php else: ?>

							<p>No Movies Found. Sorry.</p>

						<?php endif; ?>
					
					</div>
				</div>