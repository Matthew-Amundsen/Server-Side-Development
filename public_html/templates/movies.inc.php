				<div class="row">
					<div class="col-xs-12">

						<?php if (count($movies) > 0): ?>
						
							<h1>Movies</h1>

							<?php if(static::$auth->user()): ?>
								<p>
									<a class="btn btn-success" href="./?page=movie.create">
										<span class="glyphicon glyphicon-plus"></span> Add Movie
									</a>
								</p>
							<?php endif; ?>
							
							<ul>
								<?php foreach($movies as $movie): ?>
									<li><a href="./?page=movie&amp;id=<?= $movie->id ?>">
									<?= $movie->title; ?>
									</a></li>
								<?php endforeach; ?>
							</ul>

						<?php else: ?>

							<p>No Movies Found. Sorry.</p>

						<?php endif; ?>
					
					</div>
				</div>