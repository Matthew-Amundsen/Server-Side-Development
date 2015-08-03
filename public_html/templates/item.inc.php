				<div class="col-xs-10">

					<h1><?= $item->name ?></h1>
					<p><?= $item->description ?></p>

					<p>
						<a href="./?page=item.edit&amp;id=<?= $item->id ?>" class="btn btn-danger">
							<span class="glyphicon glyphicon-fire"></span> Edit Item
						</a>
					</p>

				</div>