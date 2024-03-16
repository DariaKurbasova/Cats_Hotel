<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\DataTableService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomsController extends Controller
{
    public function index(): View
    {
        return view('admin.rooms');
    }

    public function getList(Request $request): JsonResponse
    {
        $query = Room::query()
            ->select([
                'name',
                'size',
                'description',
                'is_valid',
            ]);

        return response()->json(DataTableService::getData($request, $query));
    }
}
