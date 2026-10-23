<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Attribute;

/**
 * Never writes the property, even when it is constructor-promoted.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ResponseOnly
{
}
