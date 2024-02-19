<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\chitietspchung;
use App\Models\chitietsprieng;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\QueryException;
use LengthException;
use Session;
class SanphamController extends Controller
{
    public function index()
    {   $chon = DB::table('khuyenmais')->get();
        $sp = Sanpham:: paginate(5);
        return view('admin.indexsanpham',['chon'=>$chon], compact('sp'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function search(Request $request)
    {
        
        $query = $request->input('query');
      
        $listsanpham = Sanpham::where('tensp', 'like', "%" . $query . "%")->get();
        return view('user.index', compact('listsanpham'));
    }
    public function productsByBrand($brand)
    {
        $listsanpham = Sanpham::where('thuonghieu', $brand)->get();
        return view('user.index', compact('listsanpham'));
    }
    public function detailsp($id)
    { 
        $lay1sp=DB::table('sanphams')
        ->where('id',$id) 
        
        ->first();
    
        $lay1spc=DB::table('chitietspchungs')
        ->where('masp',$lay1sp->id)
        ->first();
        $lay1spr=DB::table('chitietspriengs')
        ->where('masp',$lay1sp->id)
        ->get();
        return view('user.productdetail',['title'=>'thong tin'],['lay1sp'=>$lay1sp,'lay1spc'=>$lay1spc,'lay1spr'=>$lay1spr]);
    }
    public function addetailsp($id)
    {
       
        $lay1sp=DB::table('sanphams')
        ->where('id',$id)
        ->first();
        $lay1spc=DB::table('chitietspchungs')
        ->where('masp',$lay1sp->id)
        ->first();
        $lay1spr=DB::table('chitietspriengs')
        ->where('masp',$lay1sp->id)
        ->get();
        return view('admin.detail',['title'=>'thong tin'],['lay1sp'=>$lay1sp,'lay1spr'=>$lay1spr,'lay1spc'=>$lay1spc]);
    }
    public function themsanphamrieng(Request $request)
    {
        if ($request->isMethod('post'))
                {
                    $validator = Validator::make
                        ($request->all(),
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
                }
        
        $row = DB::table('sanphams')->where('tensp', $request->tensp)->first();
        //dd($request->tensp);
        $length =  count($request->input('bonhotrong'));
        {
            for($i=0;$i<$length;$i++)
            {
            $listsanpham = DB::table('chitietspriengs')->where('ram', $request->ram[$i])->where('bonhotrong', $request->bonhotrong[$i])
            ->where('gia', $request->gia[$i])->where('mau', $request->mau[$i])->first();
            
           if(!$listsanpham)
           {
            $newctspr= new Chitietsprieng();
            $newctspr->masp=$row->id;
            $newctspr->ram=$request->ram[$i];
            $newctspr->bonhotrong=$request->bonhotrong[$i];
            $newctspr->soluong=$request->soluong[$i];
            $newctspr->gia=$request->gia[$i];
            $newctspr->mau=$request->mau[$i];
            $newctspr->save();
           }
           else
           {
            $suasanpham= chitietsprieng::find($listsanpham->id);
            $suasanpham->masp=$row->id;
            $suasanpham->ram=$request->ram[$i];
            $suasanpham->bonhotrong=$request->bonhotrong[$i];
            $suasanpham->soluong=$listsanpham->soluong+$request->soluong[$i];
            $suasanpham->gia=$request->gia[$i];
            $suasanpham->mau=$request->mau[$i];
            $suasanpham->save();
           }
            


             
            }
        Alert::success('Thông báo','Them moi san pham thanh cong');
        return back()->with('message');
        }
        
        
    }
    public function pagesanpham()
    {
        return view('user/productdetail');
    }
    public function pagehinhanh()
    {
        return view('admin/formthemhinhanh');
    }

    public function create()
    {
        //
        return view('admin/formthemmoisanpham',['title'=>'themsanpham']);
    }

    public function layallsanpham()
    {
        $listsanpham = DB::table('sanphams')->where('trangthai', '1')->get();
        //dd($listsanpham);
        return view('user.index',['title'=>'trang chủ'],['listsanpham'=>$listsanpham]);
    }
    public function layallsanpham1()
    {
        $listsanpham = DB::table('sanphams')->where('trangthai', '1')->get();
        //dd($listsanpham);
        return view('admin.formthemchitietsanphamrieng',['title'=>'none'],['listsanpham'=>$listsanpham]);
    }
    public function store(Request $request)
    {    
        if ($request->isMethod('post'))
        {
                    $validator = Validator::make
                        ($request->all(),
                            [                                     
                            ],                    
                        );
                    if ($validator->fails())
                    {
                        return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                    }
                       $Sanpham =DB::table('sanphams')->where('tensp',$request->tensp)->first();
                  
                if (!$Sanpham)
                {
                    try
                    {    
                     
                       $value= DB::transaction(function() use ($request)                      
                        {

                            $check= $request->hasFile('picture__input') ? true: false;
                            
                         if ($check == true)
                         {
                            
                            $file = $request->file('picture__input');
                             $destination_Path = public_path('images/404');
                            $file_Name=$file->getClientOriginalName();
                             $file->move($destination_Path,$file_Name);
                            
                         }
                         else
                         {
                            $file_Name ='none.jpg';
                         } 
                          $check1=$request->hasFile('anhsanpham') ? true: false;
                          if ($check1 == true)
                          
                         {
                            $image= array();
                            if($files =$request->file('anhsanpham'))
                            {
                                foreach($files as $file)
                                {
                                   // $image_name=md5(rand(1000,10000));
                                    $ext= strtolower($file->getClientOriginalName());
                                    $image_full_name= $ext;
                                    $upload_path= public_path(('images/upload'));
                                    
                                    $file->move($upload_path,$image_full_name);
                                    $image[]=$image_full_name;
                                }  
                            }
                         }       
                         
                            $newSp= new Sanpham();                          
                            $newSp->tensp=$request->tensp;  
                                                 
                            $newSp->anhbia=$file_Name;
                            $newSp->anhsanpham=implode('|',$image);
                            $newSp->thuonghieu=$request->thuonghieu; 
                            $newSp->trangthai=1;
                          
                            $newSp->save();

                           
                            $last_record = DB::table('sanphams')->latest('created_at')->first();
                            $newctspc= new chitietspchung();
                            $newctspc->masp=$last_record->id;
                            $newctspc->mota=$request->mota;
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
                            $newctspc->cpu=$request->cpu;        
                            $newctspc->gpu=$request->gpu;
                            $newctspc->save();
                           
                           return true;                                                
                        }  
                        );                       
                    }
                    catch (QueryException $e)
                    {
                        
                        $value=false;
                        
                    }
                   if($value)
                   {
                  
                    Alert::success('Thông báo','Thêm mới sản phẩm thành công!');
                     return redirect()->route('form-them-moi-sp')->with('message');  
                   }
                    
                }
                else
                {
                  Alert::error('Thông báo','Tên sản phẩm đã tồn tại');
                  return redirect()->route('form-them-moi-sp')->with('message');     
                }
               
                
        }
    }
    public function an($id) {
       
        DB::table('sanphams')->where('id',$id)->update(['trangthai'=>0]);
        Session::put('message', 'Ẩn sản phẩm thành công');
        return redirect()->route('index-san-pham'); 
    }   

    public function hien($id){
       
        DB::table('sanphams')->where('id',$id)->update(['trangthai'=>1]);
        Session::put('message','Hiện sản phẩm thành công');
        return redirect()->route('index-san-pham'); 
    }
    public function edit($id)
    { 
        $sanpham = Sanpham::find($id);
        $sanphamc = DB::table('chitietspchungs')->where('masp',$id)->first();
       
        return view('admin.editsanpham', [
            'title' => 'thong tin',
            'sanpham' => $sanpham,
            'sanphamc' => $sanphamc
        ]);

    }
    public function update(Request $request,$id)
    {
        $sanpham = Sanpham::find($id);
        $sanpham->tensp = $request->input('tensp');
        
        if ($request->hasFile('picture__input')) {
            $file = $request->file('picture__input');
            $destinationPath = public_path('images/404');
            $file_Name = $file->getClientOriginalName();
            $file->move($destinationPath, $file_Name);
            $sanpham->anhbia = $file_Name;
        }

        if ($request->hasFile('anhsanpham')) {
            $images = array();
            $files = $request->file('anhsanpham');
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $image_full_name = $ext;
                $upload_path = public_path(('images/upload'));
                $file->move($upload_path, $image_full_name);
                $images[] = $image_full_name;
            }
            $sanpham->anhsanpham = implode('|', $images);
        }

        $sanpham->thuonghieu = $request->input('thuonghieu');
        $sanpham->save();

        
        $sanphamc = chitietspchung::where('masp',$id)->first();
        
        $sanphamc->mota=$request->input('mota');      
        $sanphamc->ktmanhinh=$request->input('ktmanhinh');
        $sanphamc->cnmanhinh=$request->input('cnmanhinh');
        $sanphamc->dophangiai=$request->input('dophangiai');
        $sanphamc->tinhnangmanhinh=$request->input('tinhnangmanhinh');
        $sanphamc->tansoquet=$request->input('tansoquet');
        $sanphamc->camerasau=$request->input('camerasau');
        $sanphamc->quayvideo=$request->input('quayvideo');
        $sanphamc->cameratruoc=$request->input('cameratruoc');
        $sanphamc->quayvideotruoc=$request->input('quayvideotruoc');
        $sanphamc->thesim=$request->input('thesim');
        $sanphamc->hedieuhanh=$request->input('hedieuhanh');
        $sanphamc->hotromang=$request->input('hotromang');
        $sanphamc->wifi=$request->input('wifi');
        $sanphamc->gps=$request->input('gps');
        $sanphamc->kichthuoc=$request->input('kichthuoc');
        $sanphamc->trongluong=$request->input('trongluong');
        $sanphamc->congsac=$request->input('congsac');
        $sanphamc->pin=$request->input('pin');        
        $sanphamc->thoidiemramat=$request->input('thoidiemramat');
        $sanphamc->chipset=$request->input('chipset');        
        $sanphamc->cpu=$request->input('cpu');        
        $sanphamc->gpu=$request->input('gpu');
        $sanphamc->save();
        return redirect()->route('index-san-pham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        
    $chitietspchung = chitietspchung::where('masp', $id)->first();
    $chitietsprieng = chitietsprieng::where('masp', $id)->get();
          
    if (!$chitietspchung) {
        return redirect()->route('deletesanpham')->with('error', 'Không tìm thấy sản phẩm.');
    }

    foreach ($chitietsprieng as $item) {
        $item->delete();
    }
  
    $chitietspchung->delete();

    $sanpham = Sanpham::find($id);
    if ($sanpham) {
        $sanpham->delete();
    }

    return redirect()->route('index-san-pham')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

              
}
    


 


