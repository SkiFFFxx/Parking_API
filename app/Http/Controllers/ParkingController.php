<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index()
    {
        $parking_slots = [
            'first' => '21:00',
            'second' => '00:00',
            'third' => '03:00',
        ];
        dd($parking_slots);
    }
}
