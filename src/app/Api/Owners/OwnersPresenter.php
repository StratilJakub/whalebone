<?php

declare(strict_types=1);

namespace App\Api\Owners;

use App\Repository\OwnersRepository;
use App\Schema\OwnersSchema;
use Nette\Application\Attributes\Requires;
use Nette\Application\UI\Presenter;
use Nette\Utils\Json;

final class OwnersPresenter extends Presenter
{
	public function __construct(
		private OwnersRepository $owners,
		private OwnersSchema $schema,
	) {
	}

	#[Requires(methods: 'POST')]
	public function actionPost(): void
	{
		$json = $this->getHttpRequest()->getRawBody();
		$data = Json::decode($json);

		$owner = $this->schema->validate($data);
		$ownerId = $this->owners->insertOwner($owner);

		$this->sendJson(['id' => $ownerId]);
	}
}
