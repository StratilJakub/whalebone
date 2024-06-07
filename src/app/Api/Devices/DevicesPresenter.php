<?php

declare(strict_types=1);

namespace App\Api\Devices;

use App\Repository\DevicesRepository;
use App\Schema\DevicesSchema;
use Nette\Application\Attributes\Requires;
use Nette\Application\UI\Presenter;
use Nette\Utils\Json;

final class DevicesPresenter extends Presenter
{
	public function __construct(
		private DevicesRepository $devices,
		private DevicesSchema $schema,
	) {
	}

	#[Requires(methods: 'GET')]
	public function actionGet(): void
	{
		$devices = $this->devices->getDevices();
		$this->sendJson($devices);
	}

	#[Requires(methods: 'POST')]
	public function actionPost(): void
	{
		$json = $this->getHttpRequest()->getRawBody();
		$data = Json::decode($json);

		$device = $this->schema->validate($data);
		$deviceId = $this->devices->insertDevice($device);

		$this->sendJson(['id' => $deviceId]);
	}
}
