<?php

namespace Bexio\Resources\Sales\ItemPositions\Enums;

enum ItemPositionType: string
{
    case CUSTOM = 'KbPositionCustom';
    case ARTICLE = 'KbPositionArticle';
    case TEXT = 'KbPositionText';

    case SUBTOTAL = 'KbPositionSubtotal';

    case PAGEBREAK = 'KbPositionPagebreak';

    case DISCOUNT = 'KbPositionDiscount';

    case SUBPOSITION = 'KbPositionSubposition';

}
