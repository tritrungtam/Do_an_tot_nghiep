<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  public function indexcart(Request $req)
  {
      $cart = $req->session()->get('cart', []);
      return view('user.cart', ['cart' => $cart]);
  }
     

    public function AddCart(Request $req ){
  
          $id=$req->masp;
          $idrieng=$req->machitietsp;
          $soluong=$req->soluong;
        $product = DB::table('sanphams') -> where('id',$id)->first();
        $lay1spr = DB::table('chitietspriengs') -> where('id',$idrieng) ->first();
          // dd($lay1spr);
          $cart = $req->Session()->get('cart',[]);
          
          if(array_key_exists($idrieng, $cart)){
                     $cart[$idrieng]['soluong']=$cart[$idrieng]['soluong']+$soluong;
                   } else{
        
                     $cart[$idrieng ]=['id' => $id, 'ten' => $product->tensp, 'soluong' => $soluong, 'gia'=> $lay1spr->gia,'mau'=> $lay1spr->mau, 'bonhotrong'=> $lay1spr->bonhotrong,'anhbia'=> $product->anhbia ];
                    
                   }
        $lay1spr->soluong -= $soluong;
        DB::table('chitietspriengs')->where('id',$idrieng)->update(['soluong'=>$lay1spr->soluong ]);
        $req->Session()->put('cart',$cart);
    
        return view('user.cart',['cart'=>$cart]);
    }

    public function removeItem(Request $request, $id )
{
    $cart = $request->Session()->get('cart', []);
    
    if (array_key_exists($id, $cart)) {
      
      $lay1spr = DB::table('chitietspriengs') -> where('id',$id) ->first();
        $lay1spr->soluong += $cart[$id]['soluong'];
   
       unset($cart[$id]); 

        DB::table('chitietspriengs')->where('id',$id)->update(['soluong'=>$lay1spr->soluong ]);

        $request->Session()->put('cart', $cart);
      }
    return redirect()->route('indexcart');
}


}
