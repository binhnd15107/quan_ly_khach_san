<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\bill;
use App\Models\billSevice;
use App\Models\room;
use App\Models\service;
use App\Models\typeRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    private $v;
    public function __construct(
        private banner $banner,
        private room $room,
        private bill $bill,
        private typeRoom $typeRoom,
        private service $service,
        private billSevice $billSevice

    ) {
        $this->v = [];
    }

    public function index()
    {
        $this->v['banners'] = $this->banner->whereCol('bannerable_id', '=', config('util.BANNER_ROOM'));
        $this->v['typeRooms'] = $this->typeRoom->getAll();
        $room_id = $this->room->bills(request());
        $this->v['rooms'] = $this->room->index(request(), $room_id);
        // dd($this->v['rooms']);
        return view('fontend.pages.room.index', $this->v);
    }
    public function detailRoom(Request $request, $id)
    {
        $this->v['findRoom'] = $this->room->loadTypeRoom()->where('rooms.id', $id)->first();
        $this->v['typeRooms'] = $this->typeRoom->getAll();
        // dd($this->v['findRoom']);
        $room_id = $this->room->bills(request());
        $this->v['rooms'] = $this->room->index(request(), $room_id);
        return view('fontend.pages.room.detail', $this->v);
    }
    /**
     * Phòng đã thuê của user
     */
    public function myRoom(Request $request)
    {;
        $request['kh_id'] = Auth::user()->id;
        $arr = [];
        $data = $this->bill->getList($request)->get();
        $this->v['myRooms'] = $this->bill->loadArray($data, $arr);
        $this->v['services'] = $this->service->getAll();
        // $this->v['myRooms'] = $data;
        // dd($this->v['services']);
        return view('fontend.pages.room.roomUser', $this->v);
    }
    public function addService(Request $request)
    {
        $findBill = $this->bill->whereCol('name', '=', $request->bill_name)->first();
        if ($findBill == null) {
            Session::flash('error', ' Mã hóa đơn :' . $request->bill_name . ' không tồn tại');
            return redirect()->back();
        } elseif ($findBill->pay_status == 1) {
            Session::flash('error', ' Mã hóa đơn :' . $request->bill_name . ' đã thanh toán');
            return redirect()->back();
        }
        if ($request->service == null) {
            Session::flash('error', 'Chọn ít nhất 1 dịch vụ');
            return redirect()->back();
        } else {
            $total = 0;
            $request['bill_id'] = $findBill->id;
            foreach ($request->service as $item) {
                $request['service_id'] = $item;
                $res =  $this->billSevice->insertOrUpdate($request);
                $total += $res;
            }
            // $request['total_money'] = DB::raw('total_money + ' . $total);
            $this->bill->whereCol('id', '=', $findBill->id)->update(['total_money' => DB::raw('total_money + ' . $total)]);
            Session::flash('success', 'Thành công .');
            return redirect()->back();
        }
    }
}
