<?php

declare(strict_types=1);

namespace App\Repository;

use App\Object\Owner;
use Nette\Database\Explorer;

final class OwnersRepository
{
	public function __construct(
		private Explorer $database
	) {
	}

	public function insertOwner(Owner $owner): string
	{
		$this->database->table('owners')->insert([
			'first_name' => $owner->first_name,
			'last_name' => $owner->last_name,
		]);

		return $this->database->getInsertId();
	}
}
