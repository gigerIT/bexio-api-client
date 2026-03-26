<?php

declare(strict_types=1);

namespace Bexio\Resources\Files\Enums;

enum FileArchivedState: string
{
    case ALL = 'all';
    case ARCHIVED = 'archived';
    case NOT_ARCHIVED = 'not_archived';
}
