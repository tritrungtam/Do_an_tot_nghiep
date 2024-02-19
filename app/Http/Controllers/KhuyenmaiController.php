<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Khuyenmai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class KhuyenmaiController extends Controller
{
    public function index()
    {   
      
        $khuyenmai = Khuyenmai::all();
        $ngayHienTai = Carbon::now();
    
        foreach ($khuyenmai as $km) {
           
            $ngayKetThuc = Carbon::parse($km->ngayketthuc);
          
            if ($ngayHienTai->lessThan($ngayKetThuc)) {
               
                DB::table('khuyenmais')->where('id', $km->id)->update(['trangthai' => 1]);

            } else {
         
                DB::table('khuyenmais')->where('id', $km->id)->update(['trangthai' => 0]);

            }
        }
    
        return view('admin/indexkhuyenmai', compact('khuyenmai'));
    }
    public function create()
    {
        //
        return view('admin.formthemkhuyenmai',['title'=>'themkhuyenmai']);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'id'=> '',
        
            ],
               
    );
    if ($validator->fails())
    {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }  
        $newkm= new Khuyenmai();
        $newkm->id=$request->id;
        $newkm->tenkm=$request->tenkm;
        $newkm->mota=$request->mota;
        $newkm->phantram=$request->phantram;
        $newkm->trangthai=1;
        $newkm->ngaybatdau=$request->ngaybatdau;
        $newkm->ngayketthuc=$request->ngayketthuc;
       
       
        $newkm->save();

        
        return redirect()->route('form-them-moi-khuyen-mai')->with('message','them khuyen mai thanh cong');        
}    
}   
public function edit($id)
{ 
    
    $sanpham = DB::table('khuyenmais')->where('id',$id)->first();
   
    return view('admin.editkhuyenmai', [
        'title' => 'thong tin',
        'sanpham' => $sanpham
      
    ]);

}
public function update(Request $request,$id)
{
    $sanpham = Khuyenmai::find($id);
    $sanpham->tenkm = $request->input('tenkm');
    
   
    $sanpham->mota = $request->input('mota');
    $sanpham->phantram = $request->input('phantram');
    $sanpham->ngaybatdau = $request->input('ngaybatdau');
    $sanpham->ngayketthuc = $request->input('ngayketthuc');
    $sanpham->save();

    
   
    return redirect()->route('index-khuyen-mai')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}
public function destroy($id)
{
    $km = Khuyenmai::find($id);

    if ($km) {
        $km->delete();
        return redirect()->route('index-khuyen-mai')->with('success', 'Khuyến mãi đã được xóa thành công.');
    } else {
        return redirect()->route('index-khuyen-mai')->with('error', 'Không tìm thấy khuyến mãi để xóa.');
    }
}
}
