<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        $rooms = Room::onlyValid()->get();

        return view('booking', ['rooms' => $rooms]);
    }

    public function selectRoom(Room $room): JsonResponse
    {
        return response()->json(['status' => 'ok']);
    }
}
