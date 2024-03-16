<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DataTableService
{
    public static function getData(Request $request, Builder $query): array
    {
        // ToDo Фильтры
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 25);
        $orderBy = $request->get('sort_by', 'id');
        $orderDir = $request->get('sort_dir', 'asc');

        $total = $query->count();

        $data = $query->orderBy($orderBy, $orderDir)
            ->limit($perPage)
            ->offset($perPage * ($page - 1))
            ->get();

        return [
            'items' => $data,
            'total' => $total,
        ];
    }
}
