<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailClass;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
       
        //dd($request->email);
        $mail=DB::table('taikhoans')->where('email',$request->email)->first();
        $taikhoan = User::find($mail->id);
        //$data=$request->email;
        // dd($mail);
        if($mail)
        {    
            $taikhoan->tokenmatkhau = random_int(0, 100);
            $taikhoan->save();
            $details = [
                'title' => 'Bấm vào đường link này để đổi lại mật khẩu mới',
                'body' => route('changepasswordpage',['id'=>$mail->id])
            ];
          
            Mail::to($request->email)->send(new Mailclass($details));
            Alert::success('Thông báo','Chúng tôi đã gửi email khôi phục tài khoản cho bạn !');
            return redirect('user/login');
           
        }
       else
       Alert::error('Thông báo','Email bạn nhập không nằm trong hệ thống !');
        return redirect('user.forgetpassword');
    }
}
