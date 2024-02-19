<?php

namespace App\Http\Controllers;

use App\Models\Chitiethoadon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ChitiethoadonController extends Controller
{
    public function create()
    {
        //
        return view('admin/formthemchitiethoadon',['title'=>'themchitiethoadon']);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                // 'soluong'=> 'required',
        
            ],
                [
                    // 
                ]
                // [
                //  
                // ]
    );
    if ($validator->fails())
    {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }  
        $newcthd= new Chitiethoadon();
        $newcthd->mahd=$request->mahd;
        $newcthd->maspr=$request->maspr;
        $newcthd->masp=$request->masp;
        $newcthd->soluong=$request->soluong;
        $newcthd->dongia=$request->dongia;
        $newcthd->phantramkm=$request->phantramkm;
        $newcthd->thanhtien=$request->thanhtien;

        $newcthd->imei=$request->imei;
        $newcthd->thoigianbh=$request->thoigianbh;
        $newcthd->ngaytao=$request->ngaytao;
        $newcthd->ngayhet=$request->ngayhet;
        $newcthd->imei=$request->imei;

        $newcthd->save();

        
        return redirect()->route('form-them-chi-tiet-hoa-don')->with('message','them chi tiet hd thanh cong');        
}    
}
}
