<?php

namespace App\Views;

use App\Services\AuthenticationService;

abstract class View
{
	protected $data;

	protected static $auth;

	public function __construct($data = [])
	{
		$this->data = $data;
	}

	abstract public function render();

	public static function registerAuthenticationService($auth)
	{
		self::$auth = $auth;
	}

	public function paginate($url, $p, $recordCount, $pageSize = 10, $maxContextLinks = 5)
	{
		$url = "./?page=movies";
		$totalPages = ceil($recordCount / $pageSize);
		$previousPage = $p - 1;
		$nextPage = $p + 1;

		$maxContextLinks = 5;

		$low = $p - floor($maxContextLinks / 2);
		if($low < 2) {$low = 2;}
		$high = $p + floor($maxContextLinks / 2);
		if($high > $totalPages - 1) {$high = $totalPages - 1;}

		?>
		<nav>
			<ul class="pagination">

			<?php // Previous ?>
			<?php if($p > 1): ?>
				<li><a href="<?= $url ?>&amp;p=<?= $previousPage ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			<?php endif; ?>

			<?php // First ?>
			<li <?php if($p == 1): ?>class="active"<?php endif; ?>>
				<a href="<?= $url ?>&amp;p=1">1 <?php if ($p == 1): ?><span class="sr-only">(current)</span><?php endif;?></a>
			</li>

			<?php // Ellipsis ?>
			<?php if ($low != 2): ?>
				<li class="disabled">
					<span>...</span>
				</li>
			<?php endif; ?>

			<?php // Context Loop ?>
			<?php for($i = $low; $i <= $high; $i += 1 ): ?>
				<li <?php if($p === $i): ?>class="active"<?php endif; ?>>
					<a href="<?= $url ?>&amp;p=<?= $i ?>"><?= $i ?> <?php if($p == $i): ?><span class="sr-only">(current)</span><?php endif; ?></a>
				</li>
			<?php endfor; ?>

			<?php // Ellipsis ?>
			<?php if ($high != $totalPages - 1): ?>
				<li class="disabled">
					<span>...</span>
				</li>
			<?php endif; ?>

			<?php // Last ?>
				<li <?php if($p === $totalPages): ?>class="active"<?php endif; ?>>
					<a href="<?= $url ?>&amp;p=<?= $totalPages ?>"><?= $totalPages ?> <?php if($p == $totalPages): ?><span class="sr-only">(current)</span><?php endif; ?></a>
				</li>

			<?php // Next ?>
			<?php if($p < $totalPages): ?>
				<li><a href="./?page=movies&amp;p=<?= $nextpage ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			<?php else: ?>
				<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			<?php endif; ?>

			</ul>
		</nav>

		<?php

	}
}