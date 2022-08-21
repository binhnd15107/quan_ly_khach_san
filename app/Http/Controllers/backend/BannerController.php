<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\bannerRequest;
use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    private $v;
    public function __construct(private banner $banner)
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $data = $this->banner->index($request);
        $this->v['dataBanner'] = $data;
        return view('backend.pages.banner.index', $this->v);
    }
    public function add(bannerRequest $request)
    {
        $method_route = 'admin.banner.add';
        if ($request->isMethod('post')) {
            $res =   $this->banner->store($request);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công ');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return  redirect()->route($method_route);
            }
        }

        return view('backend.pages.banner.add');
    }
    public function edit(bannerRequest $request, $id)
    {
        try {

            $this->v['data'] = $this->banner->find($id);
            if ($request->isMethod('PUT')) {
                // dd($request->all());
                $res =   $this->banner->edit($request, $id);
                if ($res == null) {
                    return    redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return  redirect()->back();
                }
                return redirect()->back();
            }
            return view('backend.pages.banner.edit', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->banner->drop($id);
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
            $this->v['banner'] = $this->banner->index($request);
            return view('backend.pages.banner.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->banner->backUp($id);
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
