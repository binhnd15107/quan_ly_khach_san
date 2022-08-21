<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;
use App\Models\feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class contactController extends Controller
{
    private $v;
    public function __construct(private feedback $contact, private User $user)
    {
        $this->v = [];
    }
    public function index(Request $request)
    {

        $data = $this->contact->index($request);
        $this->v['contacts'] = $data;
        // dd($this->v['contacts']);
        return view('backend.pages.contact.index', $this->v);
    }
    public function add(Request $request)
    {
        $method_route = 'fontend.contact.add';
        if ($request->isMethod('post')) {
            $u = $this->user->whereCol('email', '=', $request->email)->first();

            if ($u == null) {
                Session::flash('error', 'Email không tồn tại trong hệ thống');
                return redirect()->route($method_route);
            }
            unset($request['email']);
            $request['kh_id'] = $u->id;
            $res =   $this->contact->store($request);
            if ($res == null) {
                return redirect()->route($method_route);
            } elseif ($res > 0) {
                $contact = [
                    'name' => $u->name,
                    'email' => $u->email,
                    'content' => $request->content,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
                ];
                Session(['contact' => $contact]);
                return redirect()->route('contact.email');
            } else {
                Session::flash('error', 'Lỗi phản hồi');
                return  redirect()->route($method_route);
            }
        }

        return view('fontend.pages.contact.contact');
    }
    public function edit(Request $request, $id)
    {
        try {
            if ($request->isMethod('PUT')) {
                // dd($request->all());
                $request['id'] = $id;
                $res =   $this->contact->edit($request, $id);
                if ($res == null) {
                    return  redirect()->back();
                } elseif ($res > 0) {
                    Session::flash('success', 'Cập nhật thành công ');
                } else {
                    Session::flash('error', 'Lỗi cập nhập');
                    return  redirect()->back();
                }
                return redirect()->back();
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->contact->drop($id);
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
            $this->v['contacts'] = $this->contact->index($request);
            return view('backend.pages.contact.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->contact->backUp($id);
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
