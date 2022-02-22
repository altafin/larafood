<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        $tablets = $this->tableService->getTablesByUuid($request->token_company);
        return TableResource::collection($tablets);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if(!$categoy = $this->tableService->getTableByuuid($identify)) {
            return response()->json(['message' => 'Table Not Found'], 404);
        }

        return new TableResource($categoy);
    }

}
