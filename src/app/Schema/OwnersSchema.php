<?php

declare(strict_types=1);

namespace App\Schema;

use App\Object\Owner;
use Nette\Schema\Expect;
use Nette\Schema\Processor;

final class OwnersSchema
{
	public function __construct(
		private Processor $processor = new Processor,
	) {
	}

	public function validate(mixed $data): Owner
	{
		$schema = Expect::structure([
			'first_name' => Expect::string()->required(),
			'last_name' => Expect::string()->required(),
		])->castTo(Owner::class);

		return $this->processor->process($schema, $data);
	}
}
