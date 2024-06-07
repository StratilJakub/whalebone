<?php

declare(strict_types=1);

namespace App\Api\Home;

use Nette\Application\Attributes\Requires;
use Nette\Application\UI\Presenter;

final class HomePresenter extends Presenter
{
	#[Requires(methods: 'GET')]
	public function actionDefault(): void
	{
		$this->sendJson(['message' => 'Whalebone API']);
	}
}
