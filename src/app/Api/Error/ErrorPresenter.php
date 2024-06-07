<?php

declare(strict_types=1);

namespace App\Api\Error;

use Nette\Application\Attributes\Requires;
use Nette\Application\UI\Presenter;
use Nette\Http\IResponse;

#[Requires(methods: '*')]
final class ErrorPresenter extends Presenter
{
	public function renderDefault(\Exception $exception): void
	{
		if ($exception instanceof \Nette\Application\BadRequestException) {
			$this->sendJson(['error' => $exception->getCode()]);
		}

		$response = $this->getHttpResponse();
		$response->setCode(IResponse::S400_BadRequest);

		$this->sendJson([
			'message' => $exception->getMessage(),
		]);
	}
}
