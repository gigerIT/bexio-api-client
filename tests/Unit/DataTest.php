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

//    dump(config('data.casts'));


    $test = DataTest::from([
        'id' => '123',
        'nestedData' => [
            'title' => 'test',
            'nestedEnum' => 'bar'
        ]
    ]);

//    dump(config('data'));
//    dump(config('data.date_format'));

    expect($test->nestedData)->toBeInstanceOf(NestedDataTest::class);
    expect($test->nestedData->nestedEnum)->toEqual(NestedEnumTest::BAR);

});






