			<div class="row">
				<div class="col-xs-12">
					<h1>Search</h1>

					<?php if (count($movies) > 0): ?>

					<ol>
						<?php foreach($movies as $movie): ?>
							<li>
								<h3><a href="./?page=movie&amp;id=<?= $movie->id ?>">
								<?= $movie->title; ?>
								</a></h3>
								<p><?= $movie->description; ?></p>
							</li>
						<?php endforeach; ?>
					</ol>

					<?php else: ?>

						<p>There are no movies that match.</p>

					<?php endif; ?>

				</div>
			</div>