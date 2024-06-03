<?php
declare(strict_types=1);


namespace Bexio\Resources;

class Resource
{
    public static function from(array $data): static
    {
        $reflection = new \ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();
        $parameters = $constructor ? $constructor->getParameters() : [];
        $args = [];

        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $type = $parameter->getType() && !$parameter->getType()->isBuiltin()
                ? new \ReflectionClass($parameter->getType()->getName())
                : null;

            if ($type && $type->isEnum()) {
                $args[$name] = isset($data[$name]) ? $type->getMethod('from')->invoke(null, $data[$name]) : null;
            } else {
                $args[$name] = $data[$name] ?? null;
            }
        }

        $instance = $reflection->newInstanceArgs($args);

        // Set properties that are not declared in the constructor
        $properties = $reflection->getProperties();
        foreach ($properties as $property) {
            $name = $property->getName();
            if (!array_key_exists($name, $args) && array_key_exists($name, $data)) {
                $property->setAccessible(true);
                $type = $property->getType() && !$property->getType()->isBuiltin()
                    ? new \ReflectionClass($property->getType()->getName())
                    : null;

                if ($type && $type->isEnum()) {
                    $property->setValue($instance, isset($data[$name]) ? $type->getMethod('from')->invoke(null, $data[$name]) : null);
                } else {
                    $property->setValue($instance, $data[$name]);
                }
            }
        }

        return $instance;
    }

    public static function collect(array $resources): array
    {
        return array_map(fn($resource) => self::from($resource), $resources);
    }

    public function toArray(): array
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();
        $data = [];

        foreach ($properties as $property) {
            $name = $property->getName();
            if (isset($this->$name)) {
                $data[$name] = $this->$name;
            }

        }

        return $data;
    }
}