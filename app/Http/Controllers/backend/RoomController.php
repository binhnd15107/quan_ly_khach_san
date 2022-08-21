<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\roomRequests;
use App\Models\bill;
use App\Models\room;
use App\Models\typeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    private $v;
    public function __construct(private typeRoom $typeRoom, private room $room)
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        // $arr = ['83'];
        // // dd($arr);
        // $a = new bill();
        // $this->v['abc'] = $a->getList($request)->get();
        // dd($this->v['abc']);
        $data = $this->room->index($request);
        $this->v['dataRoom'] = $data;
        $this->v['typeRooms'] = $this->typeRoom->getAll();
        return view('backend.pages.room.index', $this->v);
    }
    public function add(roomRequests $request)
    {
        $method_route = 'admin.room.add';
        $this->v['typeRooms'] = $this->typeRoom->getAll();
        if ($request->isMethod('post')) {
            // dd($request->images);
            $res =   $this->room->store($request);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công ');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return  redirect()->route($method_route);
            }
        }

        return view('backend.pages.room.add', $this->v);
    }
    public function edit(roomRequests $request, $id)
    {
        try {
            $this->v['typeRooms'] = $this->typeRoom->getAll();
            $this->v['data'] = $this->room->find($id);
            if ($request->isMethod('PUT')) {
                $res =   $this->room->edit($request, $id);
                if ($res == null) {
                    return redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return   redirect()->back();
                }
                return redirect()->back();
            }
            return view('backend.pages.room.edit', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->room->drop($id);
                Session::flash('success', 'Xóa thành công ');
            } else {
                Session::flash('error', 'Bạn không có quyền xóa nội dung này ');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function softDelete(Request $request)
    {
        try {
            $this->v['dataRoom'] = $this->room->index($request);
            return view('backend.pages.room.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->room->backUp($id);
                Session::flash('success', 'Backup thành công ');
            } else {
                Session::flash('error', 'Bạn không có quyền backup nội dung này ');
            }
            return  redirect()->back();
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
}
