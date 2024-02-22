<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\View\View;

class RoomsController extends Controller
{
    public function index(): View
    {
        $rooms = Room::all();

        return view('admin.rooms', ['rooms' => $rooms]);
    }
}
