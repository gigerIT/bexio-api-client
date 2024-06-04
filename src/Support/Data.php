<?php

use Illuminate\Container\Container;

/**
 * This Helper imitates the Laravel config & app container functions, in order to make the laravel-data package work.
 */

if (!function_exists('config')) {
    function config($key)
    {
        $config = [
            'data' =>
                [
                    /**
                     * The package will use this format when working with dates. If this option
                     * is an array, it will try to convert from the first format that works,
                     * and will serialize dates using the first format from the array.
                     */
                    'date_format' => DATE_ATOM,

                    /**
                     * Global transformers will take complex types and transform them into simple
                     * types.
                     */
                    'transformers' => [
                        DateTimeInterface::class => \Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer::class,
                        \Illuminate\Contracts\Support\Arrayable::class => \Spatie\LaravelData\Transformers\ArrayableTransformer::class,
                        BackedEnum::class => Spatie\LaravelData\Transformers\EnumTransformer::class,
                    ],

                    /**
                     * Global casts will cast values into complex types when creating a data
                     * object from simple types.
                     */
                    'casts' => [
                        DateTimeInterface::class => Spatie\LaravelData\Casts\DateTimeInterfaceCast::class,
                        BackedEnum::class => Spatie\LaravelData\Casts\EnumCast::class,
                    ],

                    /**
                     * Rule inferrers can be configured here. They will automatically add
                     * validation rules to properties of a data object based upon
                     * the type of the property.
                     */
                    'rule_inferrers' => [
                        Spatie\LaravelData\RuleInferrers\SometimesRuleInferrer::class,
                        Spatie\LaravelData\RuleInferrers\NullableRuleInferrer::class,
                        Spatie\LaravelData\RuleInferrers\RequiredRuleInferrer::class,
                        Spatie\LaravelData\RuleInferrers\BuiltInTypesRuleInferrer::class,
                        Spatie\LaravelData\RuleInferrers\AttributesRuleInferrer::class,
                    ],

                    /**
                     * Normalizers return an array representation of the payload, or null if
                     * it cannot normalize the payload. The normalizers below are used for
                     * every data object, unless overridden in a specific data object class.
                     */
                    'normalizers' => [
                        Spatie\LaravelData\Normalizers\ModelNormalizer::class,
                        // Spatie\LaravelData\Normalizers\FormRequestNormalizer::class,
                        Spatie\LaravelData\Normalizers\ArrayableNormalizer::class,
                        Spatie\LaravelData\Normalizers\ObjectNormalizer::class,
                        Spatie\LaravelData\Normalizers\ArrayNormalizer::class,
                        Spatie\LaravelData\Normalizers\JsonNormalizer::class,
                    ],

                    /**
                     * Data objects can be wrapped into a key like 'data' when used as a resource,
                     * this key can be set globally here for all data objects. You can pass in
                     * `null` if you want to disable wrapping.
                     */
                    'wrap' => null,

                    /**
                     * Adds a specific caster to the Symphony VarDumper component which hides
                     * some properties from data objects and collections when being dumped
                     * by `dump` or `dd`. Can be 'enabled', 'disabled' or 'development'
                     * which will only enable the caster locally.
                     */
                    'var_dumper_caster_mode' => 'development',

                    /**
                     * It is possible to skip the PHP reflection analysis of data objects
                     * when running in production. This will speed up the package. You
                     * can configure where data objects are stored and which cache
                     * store should be used.
                     */
                    'structure_caching' => [
                        'enabled' => false,
                        'directories' => [],
                        'cache' => [
                            'store' => 'file',
                            'prefix' => 'laravel-data',
                        ],
                        'reflection_discovery' => [
                            'enabled' => false,
                            'base_path' => null,
                            'root_namespace' => null,
                        ],
                    ],

                    /**
                     * A data object can be validated when created using a factory or when calling the from
                     * method. By default, only when a request is passed the data is being validated. This
                     * behaviour can be changed to always validate or to completely disable validation.
                     */
                    'validation_strategy' => \Spatie\LaravelData\Support\Creation\ValidationStrategy::OnlyRequests->value,

                    /**
                     * When using an invalid include, exclude, only or except partial, the package will
                     * throw an
                     */
                    'ignore_invalid_partials' => false,

                    'max_transformation_depth' => 10,

                    'throw_when_max_transformation_depth_reached' => true,
                ]

        ];

        $keys = explode('.', $key);
        $value = $config;
        foreach ($keys as $key) {
            $value = $value[$key];
        }
        return $value;
    }
}

if (!function_exists('app')) {
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }
        return Container::getInstance()->make($abstract, $parameters);
    }
}