			<?php 
				$errors = $user->errors;
			?>


				<div class="row">
					<div class="col-xs-11">
							<form method="POST" action="./?page=auth.attempt" class="form-horizontal">
								<h1>Log In</h1>

								<?php if ($error): ?>
									<div class="alert alert-warning" role="alert">Your Username and password did not match.</div>
								<?php endif; ?>

								<div class="form-group form-group-lg<?php if ($errors['email']): ?> has-error <?php endif; ?>">
									<label for="email" class="col-sm-4 col-md-2 control-label">Email Address</label>
									<div class="col-sm-8 col-md-10">
										<input id="email" class="form-control input-lg" name="email" placeholder="Email Address" value="<?= $user->email; ?>">
										<div class="help-block"><?= $errors['email']; ?></div>
									</div>
								</div>

								<div class="form-group form-group-lg<?php if ($errors['password']): ?> has-error <?php endif; ?>">
									<label for="password" class="col-sm-4 col-md-2 control-label">Password</label>
									<div class="col-sm-8 col-md-10">
										<input id="password" class="form-control input-lg" name="password" type="password">
										<div class="help-block"><?= $errors['password']; ?></div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
										<button class="btn btn-default">
											<span class="glyphicon glyphicon-ok"></span> Log In
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

