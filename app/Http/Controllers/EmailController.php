<?php

namespace App\Http\Controllers;

use App\Mail\bill_final;
use App\Mail\contact;
use App\Mail\NotifyMail;
use App\Models\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    private $v;
    public function __construct(private bill $bill)
    {
        $this->v = [];
    }
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'email' => 'binhndph15107@fpt.edu.vn'
        ];
        if (Session::has('cart')) {
            foreach ([Auth::user()->email, 'binhndph15107@fpt.edu.vn'] as $recipient) {
                Mail::to($recipient)->send(new NotifyMail($mailData));
            }

            Session::forget('cart');
            Session::flash('success', 'Đặt hàng thành công . Chúng tôi đã gửi email cho bạn vui lòng check email');
            return redirect()->route('fontend.bill.formbill');
        }
    }
    public function billFinal(Request $request)
    {

        $data = $this->bill->getList($request)->where('bills.name', $request->ip)->get();

        if (count($data) == 0) {
            Session::flash('error', 'Mã hóa đơn không hợp lệ');
            return redirect()->back();
        }
        $arr = [];
        $bill = $this->bill->loadArray($data, $arr);
        $mailData = [
            'bill' => $bill[0],
            'email' => 'binhndph15107@fpt.edu.vn'
        ];
        // dd($mailData['bill']);
        Mail::to($bill[0]->uEmail)->send(new bill_final($mailData));
        Session::flash('success', 'Chúng tôi đã gửi hóa đơn cho bạn vui lòng check email');
        return redirect()->back();
    }
    public function contactEmail()
    {
        $mailData = [
            'title' => 'Thư phản hồi',
        ];
        if (Session::has('contact')) {
            $mailData['contact'] = session('contact');
            Mail::to('binhndph15107@fpt.edu.vn')->send(new contact($mailData));
            Session::forget('contact');
            Session::flash('success', 'Phản hồi thành công . Chúng tôi sẽ trả lời bạn sớm nhất.');
            return redirect()->route('fontend.contact.add');
        }
    }
}
