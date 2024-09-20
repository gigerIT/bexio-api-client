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


    public function getUrlResource()
    {
        return match ($this) {
            ItemPositionType::CUSTOM => 'kb_position_custom',
            ItemPositionType::ARTICLE => 'kb_position_article',
            ItemPositionType::TEXT => 'kb_position_text',
            ItemPositionType::SUBTOTAL => 'kb_position_subtotal',
            ItemPositionType::PAGEBREAK => 'kb_position_pagebreak',
            ItemPositionType::DISCOUNT => 'kb_position_discount',
            ItemPositionType::SUBPOSITION => 'kb_position_subposition',
        };
    }

}
