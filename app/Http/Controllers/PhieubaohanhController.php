<?php

namespace App\Http\Controllers;

use App\Models\Phieubaohanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PhieubaohanhController extends Controller
{
    public function index()
    {
        $baohanh = Phieubaohanh::all();
        return view('admin/indexbaohanh', compact('baohanh'));
    }
    public function edit(Phieubaohanh $phieubaohanh){
        
    }
    public function create()
    {
        //
        return view('admin/formthembaohanh',['title'=>'thembaohanh']);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
                'mabh'=> '',
        
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
        $newbh= new Phieubaohanh();
        $newbh->mabh=$request->mabh;
        $newbh->maspr=$request->maspr;
        $newbh->masp=$request->masp;

        $newbh->hotenkh=$request->hotenkh;
        $newbh->diachi=$request->diachi;
        $newbh->ngaytaophieu=$request->ngaytaophieu;
        $newbh->tinhtrang=$request->tinhtrang;

      

        $newbh->imei=$request->imei;
        $newbh->save();

        
        return redirect()->route('form-them-moi-phieu-bao-hanh')->with('message','them phieu bao hanh thanh cong');        
}    
}
}
