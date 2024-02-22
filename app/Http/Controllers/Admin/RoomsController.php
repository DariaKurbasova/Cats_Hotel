<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
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
        // ToDo Вынести в сервис и мб фильтры для моделек
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 25);

        $query = Room::select([
            'name',
            'size',
            'description',
            'is_valid',
        ]);

        $total = $query->count();

        $data = $query->limit($perPage)->offset($perPage * ($page - 1))->get();

        return response()->json([
            'items' => $data,
            'total' => $total,
        ]);
    }
}
