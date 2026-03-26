<?php

declare(strict_types=1);

test('globals')
    ->expect(['dd', 'ddd', 'die', 'dump', 'ray', 'sleep'])
    ->toBeUsedInNothing();
