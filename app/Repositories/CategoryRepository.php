<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $entity;
    public function __construct(Category $category)
    {
        $this->entity = $category;
    }

    public function getCategoriesByTenant(string $uuid)
    {
        return $this->entity
            ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
            ->where('tenants.uui', $uuid)
            ->select('categories.*')
            ->get();
    }

    public function getCategoriesByTenantId(int $idTenant)
    {
        return $this->entity->where('tenant_id', $idTenant)->get();
    }
}
