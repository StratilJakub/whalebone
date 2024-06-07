<?php

declare(strict_types=1);

namespace App\Core;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('/', 'Home:default');
		$router->addRoute('/owners/new', 'Owners:post');
		$router->addRoute('/devices/', 'Devices:get');
		$router->addRoute('/devices/new', 'Devices:post');

		return $router;
	}
}
