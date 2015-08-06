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
				<li <?php if ($page === "index"): ?>class="active"<?php endif; ?>><a href="./">Categories</a></li>
				<li <?php if ($page === "movies"): ?>class="active"<?php endif; ?>><a href="./?page=movies">Top</a></li>
				<li <?php if ($page === "movie"): ?>class="active"<?php endif; ?>><a href="./?page=movie&amp;id=56">Latest</a></li>
			</ul>			
		</nav>
		<hr>
<!-- Login / Register Buttons - When you first visit this is displayed-->
		<ul>
			<?php if(! static::$auth->check()): ?>
				<li <?php if ($page === "auth.register"): ?>class="active"<?php endif; ?>><a href="./?page=register">Register</a></li>
				<li <?php if ($page === "auth.login"): ?>class="active"<?php endif; ?>><a href="./?page=login">Log In</a></li>
			<?php else: ?>
				<li><a href="./?page=profile&amp;id=<?= static::$auth->user()->id; ?>"><?= static::$auth->user()->username; ?></a>
				<li><a href="./?page=logout">Logout</a></li>
			<?php endif; ?>
		</ul>
<!-- ======================================================================================================================== -->
		<hr>
	</div>
	
	<div class="container">
		<?php $this->content(); ?>
	</div>
</body>
</html>