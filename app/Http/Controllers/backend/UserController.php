<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\role as ModelsRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $v;
    public function __construct(private User $user, private ModelsRole $role)
    {
        $this->v = [];
    }
    public function index(Request $request)
    {
        $data = $this->user->index($request);
        $this->v['dataUser'] = $data;
        $this->v['roles'] = $this->role->getAll();
        // dd($this->v['roles']);
        return view('backend.pages.user.index', $this->v);
    }
    public function delete($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->user->drop($id);
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
            $this->v['dataUser'] = $this->user->index($request);
            return view('backend.pages.user.softDelete', $this->v);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function backUp($id)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $this->user->backUp($id);
                Session::flash('success', 'Backup thành công ');
            } else {
                Session::flash('error', 'Bạn không có quyền backup nội dung này ');
            }
            return  redirect()->back();
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
    public function updateRole($id, Request $request)
    {

        if (Auth::user()->hasRole('admin')) {
            $this->user->updateRole($id, $request);
            Session::flash('success', 'Cập nhật thành công ');
        } else {
            Session::flash('error', 'Bạn không có quyền cho nội dung này ');
        }
        return  redirect()->back();
    }
}
