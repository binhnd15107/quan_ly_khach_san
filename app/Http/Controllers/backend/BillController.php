<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\discountCode;
use App\Models\service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    private $v;
    public function __construct(private bill $bill, private service $service, private discountCode $voucher)
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $data = $this->bill->index($request);
        $arr = [];
        $this->v['bills'] = $this->bill->loadArray($data, $arr);
        $this->v['dataBill'] = $data;
        // dd($this->v['bills']);
        return view('backend.pages.bill.index', $this->v);
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->bill->drop($id);
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
            $this->v['dataBill'] = $this->bill->index($request);
            // dd($this->v['dataBill']);
            return view('backend.pages.bill.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->bill->backUp($id);
                Session::flash('success', 'Backup thành công ');
            } else {
                Session::flash('error', 'Bạn không có quyền backup nội dung này ');
            }
            return  redirect()->back();
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function formBill(Request $request)
    {
        $this->v['service'] = $this->service->getAll();
        $data = [
            ['start_time', '<=', Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()],
            ['end_time', '>=',    Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()],
            ['status', '=', config('util.UN_DROP')],
        ];
        $this->v['voucher'] = $this->voucher->whereCols($data);
        if ($request->has('voucher') && $request->voucher != null) {
            // dd($request->voucher);
            $this->v['addVoucher'] = $this->voucher->find($request->voucher);
            // dd($this->v['addVoucher']);
            Session::flash('success', 'Áp mã thành công');
        }
        return view('fontend.pages.bill.formbill', $this->v);
    }
    public function addBill(Request $request)
    {
        // dd(session('cart'));
        $res =  $this->bill->store($request);;
        if ($res == null) {
            return redirect()->back();
        } elseif ($res > 0) {
            Session::flash('success', 'Đặt hàng thành công ');
            return redirect()->route('bill.email');
        } else {
            Session::flash('error', 'Lỗi thêm mới');
            return  redirect()->back();
        }
        // Session::forget('cart');
        return redirect()->back();
    }
    public function updatePay(Request $request, $id)
    {
        $request['id'] = $id;
        $res =   $this->bill->edit($request);
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
}
