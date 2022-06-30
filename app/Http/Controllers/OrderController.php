<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->service = new OrderService();
    }

    public function list()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function show(int $id)
    {
        $order = Order::query()->findOrFail($id);

        return response()->json($order);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
            'tour_starts_at' => 'required',
            'tour_ends_at' => 'required'
        ]);

        $this->service->handle($request);

        return response(status: 200);
    }
}
