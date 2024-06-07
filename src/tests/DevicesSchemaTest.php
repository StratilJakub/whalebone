<?php

use App\Object\Device;
use App\Schema\DevicesSchema;
use Nette\Schema\Processor;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

$processor = new Processor();
$schema = new DevicesSchema($processor);

$result = $schema->validate([
	'owner_id' => 1,
	'hostname' => 'doej@example',
	'device_type' => 'laptop',
	'operating_system' => 'lin',
]);
Assert::type(Device::class, $result);
Assert::same(1, $result->owner_id);
Assert::same('doej@example', $result->hostname);
Assert::same('laptop', $result->device_type);
Assert::same('lin', $result->operating_system);

Assert::throws(
	fn () => $schema->validate([
		'owner_id' => 1,
		'device_type' => 'laptop',
		'operating_system' => 'lin'
	]),
	Nette\Schema\ValidationException::class,
	"The mandatory item 'hostname' is missing."
);

Assert::throws(
	fn () => $schema->validate([
		'owner_id' => 1,
		'hostname' => 'doej@example',
		'device_type' => 'server',
		'operating_system' => 'lin'
	]),
	Nette\Schema\ValidationException::class,
	"The item 'device_type' expects to be 'pc'|'laptop'|'mobil', 'server' given."
);

Assert::throws(
	fn () => $schema->validate([
		'owner_id' => 1,
		'hostname' => 'doej@example',
		'device_type' => 'laptop',
		'operating_system' => 'windows'
	]),
	Nette\Schema\ValidationException::class,
	"The item 'operating_system' expects to be 'win'|'lin'|'macOS'|'iOS'|'android', 'windows' given."
);
