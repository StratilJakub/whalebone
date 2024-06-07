<?php

declare(strict_types=1);

namespace App\Object;

final class Device
{
	public function __construct(
		public string $hostname,
		public string $device_type,
		public string $operating_system,
		public int $owner_id,
	) {
	}
}
