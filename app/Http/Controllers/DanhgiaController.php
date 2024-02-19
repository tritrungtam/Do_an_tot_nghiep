<?php

namespace App\Http\Controllers;

use App\Models\Danhgia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DanhgiaController extends Controller
{
   
    public function store(Request $request)
    {
       
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'madg'=> 'required',
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
        $newdg= new Danhgia();
        $newdg->madg=$request->madg;
        $newdg->masp=$request->masp;
        $newdg->matk=$request->matk;
        $newdg->noidung=$request->noidung;
        $newdg->ngay=$request->ngay;
        $newdg->trangthai=0;
        $newdg->save();  
        return redirect()->route('form-them-danh-gia')->with('message','them danh gia thanh cong');        
}    
}
}
