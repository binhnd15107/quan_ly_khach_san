<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\typeRoomRequest;
use App\Models\typeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TypeRoomController extends Controller
{
    private $v;
    public function __construct(private typeRoom $typeRoom)
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $data = $this->typeRoom->index($request);
        $this->v['dataTypeRoom'] = $data;
        return view('backend.pages.typeRoom.index', $this->v);
    }
    public function create()
    {
        return view('backend.pages.typeRoom.add');
    }
    public function store(typeRoomRequest $request)
    {
        $method_route = 'admin.typeroom.create';
        $res =   $this->typeRoom->store($request);
        if ($res == null) {
            redirect()->route($method_route);
        } elseif ($res > 0) {
            Session::flash('success', 'Thêm mới thành công ');
        } else {
            Session::flash('error', 'Lỗi thêm mới');
            redirect()->route($method_route);
        }
        return redirect()->back();
    }
    public function edit(typeRoomRequest $request, $id)
    {
        try {
            $this->v['data'] = $this->typeRoom->find($id);

            if ($request->isMethod('PUT')) {
                $res =   $this->typeRoom->edit($request, $id);
                if ($res == null) {
                    return    redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return   redirect()->back();
                }
                return redirect()->back();
            }
            return view('backend.pages.typeRoom.edit', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->typeRoom->drop($id);
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
            $this->v['dataTypeRoom'] = $this->typeRoom->index($request);
            return view('backend.pages.typeRoom.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->typeRoom->backUp($id);
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
