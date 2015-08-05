				<div class="row">
					<div class="col-xs-12">
						<div class="jumbotron">		
							<h1>Error 500</h1>
							<p>Internal error. Something went wrong. Sorry :/</p>

							<?php if (DEV_ENVIRONMENT): ?>
								<div>
									<h2>Error: <?= get_class($e) ?></h2>
									<h3><?= $e->getMessage() ?></h3>
									<p>File: <?= $e->getFile() ?> Line <?= $e->getLine() ?></p>

									<?php foreach($e->getTrace() as $level => $trace): ?>
										<pre>#<?= $level ?> <?php print_r($trace); ?></pre>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>