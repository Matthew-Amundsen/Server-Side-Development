<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fallout 4 Forum</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
<body>

	<div id="navigation">
	<!-- Nav Bar -->
	<h2>FORUM</h2>

		<div class="form-group has-feedback">
			<form method="GET" action="./" role="search">
				<input type="hidden" name="page" value="search">
				<input name="q" type="search" class="form-control" placeholder="Search">
			</form>
		</div>

		<hr>
<!-- Navigation Buttons - When you first visit this is displayed-->
		<nav>
			<ul>
				<li <?php if ($page === "index"): ?>class="active"<?php endif; ?>><a href="./"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Categories</a></li>
				<li <?php if ($page === "movie"): ?>class="active"<?php endif; ?>><a href="./?page=movie&amp;id=56"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Latest</a></li>
			</ul>			
		<hr>
<!-- Login / Register Buttons - When you first visit this is displayed-->
		<ul>
			<?php if(! static::$auth->check()): ?>
				<li <?php if ($page === "auth.register"): ?>class="active"<?php endif; ?>><a href="./?page=register"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> Register </a></li>
				<li <?php if ($page === "auth.login"): ?>class="active"<?php endif; ?>><a href="./?page=login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log In</a></li>
			<?php else: ?>
				<li><a href="./?page=profile&amp;id=<?= static::$auth->user()->id; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= static::$auth->user()->username; ?></a></li>
				<li><a href="./?page=logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li> 
			<?php endif; ?>
		</ul>
	</nav>
<!-- ======================================================================================================================== -->
		<hr>
	</div>
	
	<div class="container">
		<?php $this->content(); ?>
	</div>
</body>
</html>