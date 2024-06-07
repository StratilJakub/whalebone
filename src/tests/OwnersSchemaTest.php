<?php

use App\Object\Owner;
use App\Schema\OwnersSchema;
use Nette\Schema\Processor;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

$processor = new Processor();
$schema = new OwnersSchema($processor);

$result = $schema->validate([
	'first_name' => 'John',
	'last_name' => 'Doe'
]);
Assert::type(Owner::class, $result);
Assert::same('John', $result->first_name);
Assert::same('Doe', $result->last_name);

Assert::throws(
	fn () => $schema->validate(['first_name' => 'John']),
	Nette\Schema\ValidationException::class,
	"The mandatory item 'last_name' is missing."
);

Assert::throws(
	fn () => $schema->validate([
		'first_name' => 'John',
		'last_name' => 42
	]),
	Nette\Schema\ValidationException::class,
	"The item 'last_name' expects to be string, 42 given."
);

Assert::throws(
	fn () => $schema->validate([
		'first_name' => 'John',
		'lastName' => 'Doe'
	]),
	Nette\Schema\ValidationException::class,
	"Unexpected item 'lastName', did you mean 'last_name'?"
);
