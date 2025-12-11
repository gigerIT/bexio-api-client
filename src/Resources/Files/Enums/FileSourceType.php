<?php
declare(strict_types=1);

namespace Bexio\Resources\Files\Enums;

enum FileSourceType: string
{
    case WEB = 'web';
    case EMAIL = 'email';
    case MOBILE = 'mobile';
}

