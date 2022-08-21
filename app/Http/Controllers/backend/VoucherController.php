<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\voucherRequest;
use App\Models\discountCode;
use App\Models\room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    private $v;
    public function __construct(private discountCode $voucher, private room $room)
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        // $a = Carbon::now();
        $data = $this->voucher->index($request);
        $this->v['dataVoucher'] = $data;
        return view('backend.pages.voucher.index', $this->v);
    }
    public function add(voucherRequest $request)
    {
        if (!Auth::user()->hasRole('admin')) {
            Session::flash('error', 'Không có quyền truy cập nội dung này');
            return    redirect()->route('admin.voucher.index');
        }
        $this->v['dataRoom'] = $this->room->getAll();
        $method_route = 'admin.voucher.add';
        if ($request->isMethod('post')) {
            $res =   $this->voucher->store($request);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công ');
            } else {
                Session::flash('error', 'Lỗi thêm mới');
                return  redirect()->route($method_route);
            }
        }
        return view('backend.pages.voucher.add', $this->v);
    }
    public function edit(voucherRequest $request, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            Session::flash('error', 'Không có quyền truy cập nội dung này');
            return redirect()->back();
        }
        try {
            $this->v['data'] = $this->voucher->find($id);
            $this->v['dataRoom'] = $this->room->getAll();
            if ($request->isMethod('PUT')) {
                // dd($request->all());
                $res =   $this->voucher->edit($request, $id);
                if ($res == null) {
                    return  redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return   redirect()->back();
                }
                return redirect()->back();
            }
            return view('backend.pages.voucher.edit', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->voucher->drop($id);
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
            $this->v['dataVoucher'] = $this->voucher->index($request);
            return view('backend.pages.voucher.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->voucher->backUp($id);
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
