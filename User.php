<?php

declare(strict_types=1);
class User
{
	private string $name;

	public function __construct(array $properties)
	{
		$this->name = (string) ($properties['name'] ?? '');
	}

	public function getName(): string
	{
		return $this->name;
	}
}
