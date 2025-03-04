<?php

namespace App\Http\Controllers\Fake;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    // Получить список доступных парковочных мест
    public function getParkingSlots()
    {
        return response()->json([
            'status' => 'success',
            'slots' => [
                ['id' => 1, 'name' => 'Slot A1', 'available' => true],
                ['id' => 2, 'name' => 'Slot A2', 'available' => false],
                ['id' => 3, 'name' => 'Slot B1', 'available' => true],
            ]
        ]);
    }

    // Забронировать место (фейковая логика)
    public function bookParking(Request $request)
    {
        $request->validate([
            'slot_id' => 'required|integer',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Парковочное место успешно забронировано!',
            'data' => [
                'slot_id' => $request->slot_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time
            ]
        ]);
    }
}
