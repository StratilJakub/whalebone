<?php

declare(strict_types=1);

namespace App\Object;

final class Owner
{
	public function __construct(
		public string $first_name,
		public string $last_name,
	) {
	}
}
