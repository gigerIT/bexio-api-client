<?php


it('can create a data object from an array with nested enums', function () {
    class DataTest extends \Spatie\LaravelData\Data
    {
        public function __construct(
            public string         $id,
            public NestedDataTest $nestedData
        )
        {
        }
    }

    class NestedDataTest extends \Spatie\LaravelData\Data
    {
        public function __construct(
            public string         $title,
            public NestedEnumTest $nestedEnum = NestedEnumTest::FOO,
        )
        {
        }
    }

    enum NestedEnumTest: string
    {
        case FOO = 'foo';
        case BAR = 'bar';
    }


    $test = DataTest::from([
        'id' => '123',
        'nestedData' => [
            'title' => 'test',
            'nestedEnum' => 'bar'
        ]
    ]);

    dd($test);
})->skip('run manually only');
