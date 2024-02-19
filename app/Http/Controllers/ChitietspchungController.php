<?php

namespace App\Http\Controllers;

use App\Models\chitietspchung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ChitietspchungController extends Controller
{
    public function create()
    {
        //
        return view('admin/formchitietsanphamchung',['title'=>'themchitietsanphamchung']);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),
            [
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
        $newctspc= new chitietspchung();
        $newctspc->masp=$request->masp;  
        $newctspc->ktmanhinh=$request->ktmanhinh;
        $newctspc->cnmanhinh=$request->cnmanhinh;
        $newctspc->dophangiai=$request->dophangiai;
        $newctspc->tinhnangmanhinh=$request->tinhnangmanhinh;
        $newctspc->tansoquet=$request->tansoquet;
        $newctspc->camerasau=$request->camerasau;
        $newctspc->quayvideo=$request->quayvideo;
        $newctspc->cameratruoc=$request->cameratruoc;
        $newctspc->quayvideotruoc=$request->quayvideotruoc;
        $newctspc->thesim=$request->thesim;
        $newctspc->hedieuhanh=$request->hedieuhanh;
        $newctspc->hotromang=$request->hotromang;
        $newctspc->wifi=$request->wifi;
        $newctspc->gps=$request->gps;
        $newctspc->kichthuoc=$request->kichthuoc;
        $newctspc->trongluong=$request->trongluong;
        $newctspc->congsac=$request->congsac;
        $newctspc->pin=$request->pin;        
        $newctspc->thoidiemramat=$request->thoidiemramat;
        $newctspc->chipset=$request->chipset;        
        $newctspc->ram=$request->ram;
        $newctspc->cpu=$request->cpu;        
        $newctspc->gpu=$request->gpu;
        $newctspc->save(); 
        return redirect()->route('form-them-chi-tiet-san-pham-chung')->with('message','them sp chung thanh cong thanh cong');        
}    
}
}
