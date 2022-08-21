<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartHelper
{
    public $item = [];
    public function __construct()
    {
        $this->item = Session('cart') ? Session('cart') : [];
        // $this->total_price = $this->get_total_price();
    }
    public function add($room, $request)
    {
        $quantity = Carbon::parse($request->start_time_room)->diff(Carbon::parse($request->end_time_room))->format('%d');
        $item = [
            'id' => $room->id,
            'name' => $room->name,
            'type_room_id' => $room->type_room_id,
            'describe' => $room->describe,
            'image' => $room->image,
            'typeRoomName' => $room->typeRoomName,
            'price' => $room->price,
            'start_time' => $request->start_time_room,
            'end_time' => $request->end_time_room,
            'quantity' => $quantity,
            'total' => $quantity * $room->price
        ];
        $this->item = $item;
        Session(['cart' => $this->item]);
        // Session::forget('cart');
        // dd(session('cart'));
    }
    // public function remove($id)
    // {
    //     if (isset($this->item[$id])) {
    //         unset($this->item[$id]);
    //     }
    //     Session(['cart' => $this->item]);
    // }
    public function clear()
    {
        Session::forget('cart');
    }
    private function get_total_price()
    {
        // dd($this->item);

        // $t = 0;
        // // // foreach ($this->item as $item) {
        // $t = $this->item['price'] * $this->item['quantity'];
        // // // }
        // return $t;
    }
}
