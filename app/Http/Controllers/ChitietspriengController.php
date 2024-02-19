<?php

namespace App\Http\Controllers;

use App\Models\chitietsprieng;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class ChitietspriengController extends Controller
{
    public function create()
    {
        //
        return view('admin/formthemchitietsanphamrieng',['title'=>'themsanphamrieng']);
    }
    public function formsuactspr(){ //truyền qua để chọn tên sp cần thêm bên ct riêng
        $listSanpham = DB::table('sanphams')->where('trangthai', '1')->get();
 
        return view('admin.formchonchitiet',['listSanpham'=>$listSanpham]);
     
    }
    public function xoa1($id){

        chitietsprieng::where('id', $id)->delete();
        Alert::success('Thông báo','Đã xóa chi tiết');       
        return redirect()->back();
    }
    public function formsuactsprchitiet($id){ //sửa thông tin riêng của sp
        
        $Hienthi= Sanpham::find($id)->first();
        $listSpr = DB::table('chitietspriengs')->where('masp',$Hienthi->id)->get();       
       //dd($Hienthi);      
        return view('admin.formchinhsuachitietsanphamrieng',['Hienthi'=>$Hienthi,'listspr'=>$listSpr]);
    }
    public function chinhsuachitietspr(Request $request) //Chỉnh Sửa Chi Tiết Sản Phẩm Riêng
    {
        $length =  count($request->input('bonhotrong'));
        for($i=0;$i<$length;$i++)
        {
            $listsanpham = DB::table('chitietspriengs')->where('id', $request->id[$i])
            ->first();
            $suasanpham= chitietsprieng::find($listsanpham->id);
            $suasanpham->soluong=$request->soluong[$i];
            $suasanpham->gia=$request->gia[$i]; 
            $suasanpham->save();
        }
        Alert::success('Thông báo','Chỉnh sửa thành công');
        return redirect()->back();

    }
    public function formxoactsprchitiet($id){
        $Hienthi = DB::table('sanphams')->where('id', $id)
        ->first();
        $listSpr = DB::table('chitietspriengs')->where('masp',$Hienthi->id)->get();
        return view('admin.formxoachitietsanphamrieng',['Hienthi'=>$Hienthi,'listspr'=>$listSpr]);
     
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'maspr'=> 'required',
            ],
                [
                ]        
    );
    if ($validator->fails())
    {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }  
        $newctspr= new chitietsprieng();
        $newctspr->masp=$request->masp;
        $newctspr->maspr=$request->maspr;
        $newctspr->bonhotrong=$request->bonhotrong;
        $newctspr->soluong=$request->soluong;
        $newctspr->gia=$request->gia;
        $newctspr->mau=$request->mau;
        $newctspr->save();
        return redirect()->route('form-them-chi-tiet-san-pham-rieng')->with('message','them chi tiet spr thanh cong');        
}    
}
}
