<?php

declare(strict_types=1);

namespace App\Schema;

use App\Object\Device;
use Nette\Schema\Expect;
use Nette\Schema\Processor;

final class DevicesSchema
{
	public function __construct(
		private Processor $processor = new Processor,
	) {
	}

	public function validate(mixed $data): Device
	{
		$schema = Expect::structure([
			'hostname' => Expect::string()->required(),
			'device_type' => Expect::anyOf('pc', 'laptop', 'mobil')->required(),
			'operating_system' => Expect::anyOf('win', 'lin', 'macOS', 'iOS', 'android')->required(),
			'owner_id' => Expect::int()->required(),
		])->castTo(Device::class);

		return $this->processor->process($schema, $data);
	}
}
