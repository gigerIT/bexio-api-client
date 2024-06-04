<?php
declare(strict_types=1);


namespace Bexio\Resources;

use Saloon\Http\Request;

class Resource
{
    use QueryBuilder;

    const INDEX_REQUEST = Request::class;
    const SHOW_REQUEST = Request::class;
    const CREATE_REQUEST = Request::class;
    const UPDATE_REQUEST = Request::class;
    const DELETE_REQUEST = Request::class;

    /**
     * @throws \ReflectionException
     */
    final public static function from(array $data): static
    {
        $reflector = new \ReflectionClass(static::class);
        $instance = $reflector->newInstanceWithoutConstructor();

        foreach ($data as $key => $value) {
            if ($reflector->hasProperty($key)) {
                $property = $reflector->getProperty($key);
                $propertyType = $property->getType();

                if ($propertyType instanceof \ReflectionNamedType) {
                    $typeName = $propertyType->getName();

                    if (enum_exists($typeName)) {
                        $enumClass = $typeName;
                        if (is_string($value)) {
                            $property->setValue($instance, $enumClass::from($value));
                        } else {
                            $property->setValue($instance, $value);
                        }
                    } elseif (class_exists($typeName)) {
                        if (is_array($value)) {
                            if (self::isAssocArray($value)) {
                                // Recursively create the nested object
                                $nestedObject = $typeName::from($value);
                                $property->setValue($instance, $nestedObject);
                            } else {
                                $nestedObjects = [];
                                foreach ($value as $item) {
                                    if (is_array($item)) {
                                        $nestedObjects[] = $typeName::from($item);
                                    } else {
                                        $nestedObjects[] = $item;
                                    }
                                }
                                $property->setValue($instance, $nestedObjects);
                            }
                        } else {
                            $property->setValue($instance, $value);
                        }
                    } else {
                        $property->setValue($instance, $value);
                    }
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
                    $paramType = $param->getType();
                    if ($paramType instanceof \ReflectionNamedType) {
                        $paramTypeName = $paramType->getName();
                        if (class_exists($paramTypeName) && is_array($data[$paramName])) {
                            $constructorParams[] = $paramTypeName::from($data[$paramName]);
                        } else {
                            $constructorParams[] = $data[$paramName];
                        }
                    } else {
                        $constructorParams[] = $data[$paramName];
                    }
                } else {
                    $constructorParams[] = $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null;
                }
            }
            $reflector->getConstructor()->invokeArgs($instance, $constructorParams);
        }

        return $instance;
    }

    /**
     * Helper function to check if an array is associative.
     */
    private static function isAssocArray(array $arr): bool
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }




    final public static function collect(array $resources): array
    {
        return array_map(fn($resource) => self::from($resource), $resources);
    }


    final public function toArray(): array
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        $data = [];

        foreach ($properties as $property) {
            if (!$property->isStatic()) {
                $property->setAccessible(true);
                $name = $property->getName();
                if (property_exists($this, $name) && isset($this->$name)) {
                    $data[$name] = $property->getValue($this);
                }
            }
        }

        return $data;
    }

//    public function __call($method, $args)
//    {
//        if ($method == 'useClient') {
//            $this->useClient($args);
//        }
//    }
//
//    public static function __callStatic($name, $arguments)
//    {
//        $instance = new static();
//
//        if (method_exists($instance, $name)) {
//            return call_user_func_array([$instance, $name], $arguments);
//        } else {
//            throw new \BadMethodCallException("Method $name does not exist");
//        }
//    }

}