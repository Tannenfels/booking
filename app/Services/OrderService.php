<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Order;
use App\Models\Tour;
use App\Services\Results\OrderResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderService extends Service
{
    private Client $client;
    private Tour $tour;

    public function handle(Request $request)
    {
        $this->client = Client::query()->findOrFail($request->client_id);
        $this->tour = Client::query()->findOrFail($request->client_id);

        $order = new Order();
        $order->client_id = $this->client->client_id;
        $order->tour_id = $this->tour->tour_id;
        $order->created_at = Carbon::now()->toDateTimeString();
        $order->tour_starts_at = Carbon::parse($request->tour_starts_at)->toDateString();
        $order->tour_ends_at = Carbon::parse($request->tour_ends_at)->toDateString();
        //также сделать расчёт стоимости бронирования/заказа, но этого нет в ТЗ
        $order->save();

        return new OrderResult();
    }
}
