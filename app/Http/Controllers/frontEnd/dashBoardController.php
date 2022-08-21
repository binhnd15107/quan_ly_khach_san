<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\feedback;
use App\Models\room;
use App\Models\typeRoom;
use Illuminate\Http\Request;

class dashBoardController extends Controller
{

    private $v;
    public function __construct(
        private banner $banner,
        private room $room,
        private feedback $feedback,
        private typeRoom $typeRoom,

    ) {
        $this->v = [];
    }
    public function index(Request $request)
    {
        $this->v['banners'] = $this->banner->whereCol('bannerable_id', '=', config('util.BANNER_DB'));
        $room_id = $this->room->bills(request());
        $this->v['rooms'] = $this->room->getList(request(), $room_id)->get();
        $request['publish_content'] = 1;
        $this->v['feedbacks'] = $this->feedback->index($request);
        $this->v['typeRooms'] = $this->typeRoom->getAll();
        return view('fontend.dashboard.index', $this->v);
    }
}
