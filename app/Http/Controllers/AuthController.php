<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'không được bỏ trống email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'không được bỏ trống password',
        ];

        // $request->validate($rules, $messages);
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('auth/login')->withErrors($validator)->withInput();
        } else {
            // đón dữ liệu từ login  gửi sang
            $email = $request->email;
            $password = $request->password;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                if (Auth::user()->hasAnyRole(['nhan vien', 'admin']) && Auth::user()->status == 0) {
                    return redirect('/admin');
                } elseif (Auth::user()->hasAnyRole(['khach hang']) && Auth::user()->status == 0) {
                    return redirect()->intended('/');
                } else {
                    // return   abort(404);
                    Session::flash('error', 'Không có quyền truy cập');
                    return redirect()->route('login');
                }
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
                return redirect()->route('login');
            }
        }
    }

    public function Logout()
    {
        Session::forget('cart');
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToGoogle()
    {
        // dd('helo');
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);

            if (Auth::user()->hasAnyRole(['nhan vien', 'admin']) && Auth::user()->status == 0) {
                return redirect()->intended('/admin');
            } elseif (Auth::user()->hasAnyRole(['khach hang']) && Auth::user()->status == 0) {
                return redirect()->intended('/');
            } else {
                // return   abort(404);
                Session::flash('error', 'Không có quyền truy cập hoặc tài khoản đã bị khóa');
                return redirect()->route('login');
            }
        } else {
            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'google_id' => $user->id,
                'image' => $user->avatar,
                'password' => Hash::make(123456),
                // encrypt('123456dummy')
            ]);
            Auth::login($newUser);
            if (Auth::user()->hasAnyRole(['nhan vien', 'admin'])  && Auth::user()->status == 0) {
                return redirect()->intended('/admin');
            } elseif (Auth::user()->hasAnyRole(['khach hang']) && Auth::user()->status == 0) {
                return redirect()->intended('/');
            } else {
                // return   abort(404);
                Session::flash('error', 'Không có quyền truy cập hoặc tài khoản đã bị khóa');
                return redirect()->route('login');
            }
        }
    }
}
