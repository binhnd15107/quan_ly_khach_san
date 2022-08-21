<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\serviceRequest;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    private $v;
    public function __construct(private service $service)
    {
        $this->v = [];
    }

    public function index(Request $request)
    {

        $data = $this->service->index($request);
        $this->v['dataService'] = $data;
        return view('backend.pages.service.index', $this->v);
    }
    public function add(serviceRequest $request)
    {
        $method_route = 'admin.service.add';
        if ($request->isMethod('post')) {
            $res =   $this->service->store($request);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công ');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return  redirect()->route($method_route);
            }
        }

        return view('backend.pages.service.add');
    }
    public function edit(serviceRequest $request, $id)
    {
        try {

            $this->v['data'] = $this->service->find($id);
            if ($request->isMethod('PUT')) {

                $res =   $this->service->edit($request, $id);
                if ($res == null) {
                    return       redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return  redirect()->back();
                }
                return redirect()->back();
            }
            return view('backend.pages.service.edit', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->service->drop($id);
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
            $this->v['service'] = $this->service->index($request);
            return view('backend.pages.service.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->service->backUp($id);
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
