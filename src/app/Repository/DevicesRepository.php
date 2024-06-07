<?php

declare(strict_types=1);

namespace App\Repository;

use App\Object\Device;
use Nette\Database\Explorer;

final class DevicesRepository
{
	public function __construct(
		private Explorer $database
	) {
	}

	public function getDevices(): array
	{
		$devices = [];
		foreach ($this->database->table('devices') as $deviceRow) {
			$ownerRow = $deviceRow->ref('owner_id');

			$devices[] = [
				'id' => $deviceRow->getPrimary(),
				'hostname' => $deviceRow->hostname,
				'device_type' => $deviceRow->device_type,
				'operating_system' => $deviceRow->operating_system,
				'owner' => [
					'id' => $ownerRow->getPrimary(),
					'first_name' => $ownerRow->first_name,
					'last_name' => $ownerRow->last_name,
				],
			];
		}

		return $devices;
	}

	public function insertDevice(Device $device): string
	{
		$this->database->table('devices')->insert([
			'owner_id' => $device->owner_id,
			'hostname' => $device->hostname,
			'device_type' => $device->device_type,
			'operating_system' => $device->operating_system,
		]);

		return $this->database->getInsertId();
	}
}
