<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment = '',
        $clientid = '',
        $tableId = ''
    ) {
        $data = [
            'tenant_id' => $tenantId,
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'comment' => $comment,
        ];

        if ($clientid) $data['client_id'] = $clientid;
        if ($tableId) $data['table_id'] = $tableId;

        $order = $this->entity->create($data);
        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        // TODO: Implement getOrderByIdentify() method.
    }
}