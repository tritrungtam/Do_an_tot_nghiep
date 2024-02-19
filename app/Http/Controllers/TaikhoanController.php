<?php
namespace App\Http\Controllers;
    
use App\Models\Hoadon;
use App\Models\Taikhoan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TaikhoanController extends Controller
{
    public function trangcanhan()
    {
        return view('user/account');
    }
    public function index()
    {
        $taikhoan = User::all();
        return view('admin/indextaikhoan', compact('taikhoan'));
    }
    
    // public function layid()
    // {
    //     $layid = DB :: 
    // }

    // public function edituser()
    // {
    //     return view('user/editaccount');
    // }

    public function edituser(Request $request, $id)
    { 
        $user = User::find($id);
      
        return view('user.editaccount',
         [
            'title' => 'thong tin',
            'user' => $user
       ]);

    }
    public function updateuser(Request $request,$id)
    {
        $user = User::find($id);
        
        if ($request->hasFile('picture__input')) {
            $file = $request->file('picture__input');
            $destinationPath = public_path('images/home');
            $file_Name = $file->getClientOriginalName();
            $file->move($destinationPath, $file_Name);
            $user->avatar = $file_Name;
        }
        $user->hoten = $request->input('hoten');
        $user->sdt = $request->input('sdt');
        $user->diachi = $request->input('diachi');     
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('trangcanhan')->with('success', 'Thông tin đã được cập nhật thành công.');
    }


    public function forgetpasspage(){
        return view('user/forgetpassword');
    }
    public function create()
    {
        //
        return view('user/login');
    }
    public Function logout(){
        Auth::logout();
        Alert::warning('','Đăng xuất thành công!');
        return redirect()->route('trangdangky');
    }
    public function xu_li_dang_nhap(Request $request)
    {

        $request->validate(
            [
                'taikhoan' => 'required',
                'matkhau'=> 'required'
            ],
            [
                'taikhoan.required'=>'Tài khoản không được bỏ trống',
                'matkhau.required'=>'Mật khẩu không được bỏ trống'
            ]

            );
        $remember = $request->has('remember_token') ? true : false;
        
        if (Auth::attempt(['taikhoan'=> $request->taikhoan,'password'=>$request->matkhau], $remember))
        {
           
            if (Auth::user()->loaitk == 1)
                {

                    Alert::success('Đăng nhập thành công','hi!');
                    return redirect()->route('trangchu')->with('message','Đăng nhập thành công');
                }
                if (Auth::user()->loaitk == 0) {
                    Alert::error('Đăng nhập thất bại','Tài khoản đã bị khóa');
                      return redirect()->route('trangdangky')->with('message','');
                }
                
            else if(Auth::user())
                {
                    $dangnhaplan1= DB::table('taikhoans')->where('taikhoan',$request->taikhoan)->first();
                    $hoadon=DB::table('hoadons')->where('makh',$dangnhaplan1->id)->first();
                    if($dangnhaplan1->loaitk == 2)
                    {
                        Alert::success('Đăng nhập thành công','hi!');
                        return redirect()->route('index-san-pham')->with('message','Đăng nhập thành công');
                    }
                    if(!$hoadon)
                    {
                        $hoadonmoi= new Hoadon();
                        $hoadonmoi->makh = $dangnhaplan1->id;
                        $hoadonmoi->trangthaihd= "chưa đặt hàng";


                    }
                    
                    Alert::success('Đăng nhập thành công','hi!');
                    return redirect()->route('trangchu')->with('message',' Dang nhap thanh cong');
                }
        }
        else 
        {
            Alert::error('Đăng nhập thất bại','Sai tài khoản hoặc mật khẩu');
            return redirect()->route('trangdangky')->with('message','');
        }

}
    public function ShowSuaMatKhau($id) 
    {

        $thongtinUserdoimatkhau = User::find($id);
        if($thongtinUserdoimatkhau->tokenmatkhau)
        {
            $Userid = $thongtinUserdoimatkhau->id;
            return view('user.changepassword',['title'=>'doimatkhau'],['thongtinUserdoimatkhau'=>$thongtinUserdoimatkhau,'Userid'=>$Userid]);
        }
        else 
        {
            return view('user.404',['title'=>'pagexpire']);
        }
        
    }
    public function antk($id) {
        
        DB::table('taikhoans')->where('id',$id)->update(['loaitk'=>2]);
      
        
        return redirect()->route('index-tai-khoan'); 
    } 
    public function hientk($id) {
       
        DB::table('taikhoans')->where('id',$id)->update(['loaitk'=>0]);
       
        return redirect()->route('index-tai-khoan'); 
    } 
    public function CapNhatMatKhau(Request $request, $id)
    {
        
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'matkhaumoi'=>'required|min:6|max:20',
                'xacnhan'=>'required|min:6|max:20|same:matkhaumoi',
               
            ],
                [
                    'matkhaumatkhaumoi.required'=> ' Mật khẩu mới không được để trống',
                    'matkhaumatkhaumoi.min'=> ' Mật khẩu mới phải từ 6 kí tự trở lên',
                    'matkhaumatkhaumoi.max'=> ' Mật khẩu mới phải dưới 20 kí tự',
                    'xacnhan.required'=> ' Mật khẩu mới phải chứa 6 đến 20 kí tự',
                    'xacnhan.min'=> 'Xác nhận mật khẩu mới phải từ 6 kí tự trở lên',
                    'xacnhan.max'=> ' Xác nhận mật khẩu mới phải dưới 20 kí tự',
                    'xacnhan.same'=>' Xác nhận mật khẩu chưa trùng khớp',
                ]
                );
            if ($validator->fails())
            {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $thongtinUserdoimatkhau = User::find($id);
            //dd($id);
            //  dd(Hash::make($request->password));
            
            $thongtinUserdoimatkhau->matkhau=Hash::make($request->matkhaumoi);
            $thongtinUserdoimatkhau->tokenmatkhau = null;
            $thongtinUserdoimatkhau->save();
            Alert::success('Thành công','Mật khẩu đã được cập nhật!');
            return  redirect()->route('trangdangky');
            
        
        }

    }

    public function store(Request $request)
    { //dd($request);
        
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'taikhoan'=> 'required|min:6|max:20',
                'email'=>'required|email',
                'matkhau'=>'required|min:6|max:20',
                //'avatar'=> 'image|mimes:jpg,jpeg,png,gif',
                //'confirmpassword'=>'required_with:password|same:password|min:6|max:20',
                //'name'=>'required'
            ],
            [
                'taikhoan.required'=>' Tài khoản không được bỏ trống',
                'taikhoan.min'=>'Tài khoản phải lớn hơn 6 kí tự',
                'taikhoan.max'=>'Tài khoản phải bé hơn 20 kí tự',
                'email.required'=> ' Bạn phải nhập email',

                'matkhau.required'=> ' Mật khẩu không được bỏ trống',
                'matkhau.min'=>'Mật khẩu phải lớn hơn 6 kí tự',
                'matkhau.max'=>'Mật khẩu phải bé hơn 20 kí tự',
                    //'avatar.image'=> ' Tep avatar phai la hinh anh',
                    //'avatar.mimes'=> ' Tep avatar phai co duoi .jpg,jpeg,png,gif',
                    //'confirmpassword.same' =>' Xac nhan mat khau phai trung voi mat khau',
                   //'name.alpha'=> ' Ten phai dung ky tu chu cai va khong co khoang trang'
            ]
         );
        
            if ($validator->fails())
            {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                
            }
          $check= $request->hasFile('avatar') ? true: false;
            if ($check == true)
            {
                $file = $request->file('avatar');
                $destination_Path = public_path('image');
                $file_Name=$file->getClientOriginalName();
                $file->move($destination_Path,$file_Name);
            }
            else
            {
                $file_Name='noname.jpg';
            }

            $taikhoan =DB::table('taikhoans')->where('taikhoan',$request->taikhoan)->first();
            $email = DB::table('taikhoans')->where('email',$request->email)->first();
            if (!$taikhoan)
            {
                if(!$email)
                {
                    $newTaikhoan= new User();
                    $newTaikhoan->taikhoan=$request->taikhoan;
                    $newTaikhoan->matkhau=Hash::make($request->matkhau);
                    $newTaikhoan->email=$request->email;
                    $newTaikhoan->hoten=null;
                    $newTaikhoan->sdt=null;
                    $newTaikhoan->diachi=null;
                    $newTaikhoan->loaitk='1';
                    $newTaikhoan->avatar='noname.jpg';
                  
                    $newTaikhoan->save();
                    Alert::success('Thông báo','Đăng kí thành công mời bạn đăng nhập !');
                    return redirect()->route('trangdangky');
                }
                else
                Alert::error('Thất bại','Email đã tồn tại');
                return redirect()->route('trangdangky')->with('message','');
               
            }
            else 
            {
                
                Alert::error('Thất bại','Tài khoản đã tồn tại');
                return redirect()->route('trangdangky')->with('message','');
            }
        }
        
    
    }
    
}

