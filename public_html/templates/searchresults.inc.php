			<div class="row">
				<div class="col-xs-11">
					<h1>Search</h1>

					<?php if (count($threads) > 0): ?>

					<ol>
						<?php foreach($threads as $thread): ?>
							<li>
								<h3>
									<a href="./?page=thread&amp;id=<?= $thread->id ?>">
										<?= $thread->title; ?>
									</a>
								</h3>
								<p><?= $thread->description; ?></p>
							</li>
						<?php endforeach; ?>
					</ol>

					<?php else: ?>

						<p>There are no threads that match.</p>

					<?php endif; ?>

				</div>
			</div>