<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function list()
    {
        $tours = Tour::all();

        return response()->json($tours);
    }

    public function show(int $id)
    {
        $tour = Tour::query()->findOrFail($id);

        return response()->json($tour);
    }
}
