<?php

namespace Bexio\Support\Data;

enum SearchCriteria: string
{
    case EQUAL = '=';
    case NOT_EQUAL = '!=';
    case GREATER_THAN = '>';
    case GREATER_EQUAL = '>=';
    case LESS_THAN = '<';
    case LESS_EQUAL = '<=';
    case LIKE = 'like';
    case NOT_LIKE = 'not_like';
    case IS_NULL = 'is_null';
    case NOT_NULL = 'not_null';
    case IN = 'in';
    case NOT_IN = 'not_in';
}
