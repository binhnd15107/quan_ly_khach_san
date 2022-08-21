<?php

namespace App\Http\Controllers\frontEnd;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\room;
use App\Models\typeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $v;
    public function __construct(
        private banner $banner,
        private room $room,
        private typeRoom $typeRoom,

    ) {
        $this->v = [];
    }
    public function addCart(CartHelper $cart, $id, Request $request)
    {
        $this->v['findRoom'] = $this->room->loadTypeRoom()->where('rooms.id', $id)->first();
        $cart->add($this->v['findRoom'], $request);
        return redirect()->route('fontend.bill.formbill');
    }
    // public function remove(CartHelper $cart, $id)
    // {

    //     $cart->remove($id);
    //     // Session::flash('success', 'Xóa thành công ');
    //     return redirect()->back();
    // }
    public function clear(CartHelper $cart)
    {

        $cart->clear();
        return redirect()->back();
    }
}
