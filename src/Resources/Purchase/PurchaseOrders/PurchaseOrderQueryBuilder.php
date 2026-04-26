<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\PurchaseOrders;

use Bexio\Support\QueryBuilder;

class PurchaseOrderQueryBuilder extends QueryBuilder
{
    protected function indexRequestArguments(): array
    {
        return [
            'orderBy' => $this->getParameter('order_by'),
            'limit' => $this->getParameter('limit'),
            'offset' => $this->getParameter('offset', 0),
        ];
    }
}
