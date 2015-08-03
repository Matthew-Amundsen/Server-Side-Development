				<div class="col-xs-10">

					<?php if (count($merchandise) > 0): ?>

						<h1>Merchandise</h1>

						<p>
							<a class="btn btn-danger" href="./?page=item.create">
								<span class="glyphicon glyphicon-plus"></span> Add Item
							</a>
						</p>


						<ul>
							<?php foreach($merchandise as $item): ?>
								<li><a href="./?page=item&amp;id=<?= $item->id ?>">
								<?= $item->name; ?>
								</a></li>
							<?php endforeach; ?>
						</ul>

					<?php else: ?>

						<p>No Merchandise Found. Sorry.</p>

					<?php endif; ?>

				</div>
