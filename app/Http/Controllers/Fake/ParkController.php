<?php

namespace App\Http\Controllers\Fake;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    // Получить список доступных парковочных мест
    public function getParkingSlots()
    {
        $slots = [
            ['id' => 1, 'name' => 'Slot A1', 'available' => true],
            ['id' => 2, 'name' => 'Slot A2', 'available' => false],
            ['id' => 3, 'name' => 'Slot B1', 'available' => true],
        ];

        // Перемешиваем порядок слотов случайным образом
        shuffle($slots);

        // Рандомно меняем доступность мест
        foreach ($slots as &$slot) {
            $slot['available'] = (bool)random_int(0, 1);
        }

        return response()->json([
            'status' => 'success',
            'slots' => $slots
        ]);
    }

    // Забронировать место (фейковая логика)
    public function bookParking(Request $request)
    {
        $messages = [
            'slot_id.required' => 'Идентификатор парковочного места обязателен.',
            'slot_id.integer' => 'Идентификатор парковочного места должен быть числом.',

            'start_time.required' => 'Время начала бронирования обязательно.',
            'start_time.date_format' => 'Время начала должно быть в формате ЧЧ:ММ (например, 14:30).',

            'end_time.required' => 'Время окончания бронирования обязательно.',
            'end_time.date_format' => 'Время окончания должно быть в формате ЧЧ:ММ (например, 16:45).',
            'end_time.after' => 'Время окончания должно быть позже времени начала.',
        ];

        // Валидация с сообщениями об ошибках
        $validatedData = $request->validate([
            'slot_id' => 'required|integer',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ], $messages);

        return response()->json([
            'status' => 'success',
            'message' => 'Парковочное место успешно забронировано!',
            'data' => [
                'slot_id' => $validatedData['slot_id'],
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time']
            ]
        ]);
    }

}
