<?php
declare(strict_types=1);


namespace Bexio\Support;

class Data
{
    public static function from(array $data): static
    {
        $reflection = new \ReflectionClass(static::class);
        $properties = $reflection->getProperties();
        $args = [];

        foreach ($properties as $property) {
            $name = $property->getName();
            $args[$name] = $data[$name] ?? null;
        }

        return $reflection->newInstanceArgs($args);
    }

    public static function collect(array $data): array
    {
        return array_map(fn($contact) => self::from($contact), $data);
    }
}