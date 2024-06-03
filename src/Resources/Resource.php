<?php
declare(strict_types=1);


namespace Bexio\Resources;

class Resource
{
    public static function from(array $data): static
    {
        $reflector = new \ReflectionClass(static::class);
        $instance = $reflector->newInstanceWithoutConstructor();

        foreach ($data as $key => $value) {
            if ($reflector->hasProperty($key)) {
                $property = $reflector->getProperty($key);
                $propertyType = $property->getType();

                if ($propertyType instanceof \ReflectionNamedType && enum_exists($propertyType->getName())) {
                    $enumClass = $propertyType->getName();
                    $property->setValue($instance, $enumClass::from($value));
                } else {
                    $property->setValue($instance, $value);
                }
            }
        }

        // Call the constructor manually if needed
        $constructor = $reflector->getConstructor();
        if ($constructor) {
            $constructorParams = [];
            foreach ($constructor->getParameters() as $param) {
                $paramName = $param->getName();
                if (array_key_exists($paramName, $data)) {
                    $constructorParams[] = $data[$paramName];
                } else {
                    $constructorParams[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                }
            }
            $reflector->getConstructor()->invokeArgs($instance, $constructorParams);
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