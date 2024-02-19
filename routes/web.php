<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HoadonController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\TaikhoanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhieubaohanhController;
use App\Http\Controllers\KhuyenmaiController;
use App\Http\Controllers\DanhgiaController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\ChitietspriengController;
use App\Models\chitietsprieng;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SanphamController::class,'layallsanpham'])-> name('trangchu');

Route::prefix('admin')->group(function () {

    Route::get('formthemmoisanpham', [SanphamController::class, 'create'])->name('form-them-moi-sp');
    Route::post('formthemmoisanpham', [SanphamController::class, 'store'])->name('them-moi-sp');
    Route::get('indexsanpham', [SanphamController::class, 'index'])->name('index-san-pham');

    Route::put('updatesanpham/{id}',[SanphamController::class,'update'])->name('updatesanpham');
    Route::get('editsanpham/{id}', [SanphamController::class,'edit'])->name('editsanpham');

    Route::delete('deletesanpham/{id}',[SanphamController::class,'destroy'])->name('deletesanpham');
    //    Route::get('deletesanpham/{id}', function () { return 'Hello World'; })->name('deletesanpham');
    


    Route::get('an/{id}',[SanphamController::class, 'an'])->name('an');
    Route::get('hien/{id}',[SanphamController::class, 'hien'])->name('hien');



    Route::get('formthembaohanh',[PhieubaohanhController::class,'create'])->name('form-them-moi-phieu-bao-hanh');
    Route::post('formthembaohanh',[PhieubaohanhController::class,'store'])->name('them-moi-phieu-bao-hanh');
    Route::get('indexbaohanh',[PhieubaohanhController::class,'index'])->name('index-bao-hanh');

    //khuyến mãi
    Route::get('formthemkhuyenmai',[KhuyenmaiController::class,'create'])->name('form-them-moi-khuyen-mai');
    Route::post('formthemkhuyenmai',[KhuyenmaiController::class,'store'])->name('them-moi-khuyen-mai');
    Route::get('indexkhuyenmai',[KhuyenmaiController::class,'index'])->name('index-khuyen-mai');

    Route::post('updatekm/{id}',[KhuyenmaiController::class,'update'])->name('updatekm');
    Route::get('editkm/{id}', [KhuyenmaiController::class,'edit'])->name('editkm');
    Route::delete('deletekm/{id}',[KhuyenmaiController::class,'destroy'])->name('deletekm');


    Route::get('indextaikhoan',[TaikhoanController::class,'index'])->name('index-tai-khoan');

    Route::get('antk/{id}',[TaikhoanController::class, 'antk'])->name('antk');
    Route::get('hientk/{id}',[TaikhoanController::class, 'hientk'])->name('hientk');



    Route::get('productdetail/{id}',[SanphamController::class, 'addetailsp'])-> name('admindetailsp');


    Route::get('formchonchitiet',[ChitietspriengController::class,'formsuactspr'])->name('suactspr');
    Route::get('formchinhsuachitietsanphamrieng/{id}',[ChitietspriengController::class,'formsuactsprchitiet'])->name('suactsprct');
    Route::get('formxoachitietsanphamrieng/{id}',[ChitietspriengController::class,'formxoactsprchitiet'])->name('xoactsprct');

  
});

Route::prefix('user')->group(function(){

    Route::get('login',[TaikhoanController::class,'create'])->name('trangdangky');
    Route::post('login',[TaikhoanController::class,'store'])->name('dangky');
    Route::get('forgetpassword',[TaikhoanController::class,'forgetpasspage'])->name('trangquenmatkhau');

    Route::get('productdetail',[SanphamController::class,'pagesanpham'])->name('sanpham');


    // Route::get('formthemdanhgia',[DanhgiaController::class,'create'])->name('form-them-danh-gia');


    // Route::post('productdetail', function () { return 'Hello World'; })->name('them-moi-danh-gia1');
    Route::post('productdetail/comment',[DanhgiaController::class,'store'])->name('them-moi-danh-gia');

    Route::post('forgetpassword', [MailController::class,'sendEmail'])->name('mail');

    Route::get('productdetail/{id}',[SanphamController::class, 'detailsp'])-> name('detailsp');

    Route::get('changepassword/{id}',[TaikhoanController::class, 'ShowSuaMatKhau'])-> name('changepasswordpage');
    Route::post('changepassword/{id}',[TaikhoanController::class,'CapNhatMatKhau'])-> name('changepassword');


    Route::get('forgetpasspage',[TaikhoanController::class, 'forgetpasspage'])-> name('forgetpasspage');

    Route::get('account',[TaikhoanController::class,'trangcanhan'])->name('trangcanhan');
    Route::get('editaccount/{id}',[TaikhoanController::class,'edituser'])->name('editaccount');
    Route::put('updateaccount/{id}',[TaikhoanController::class,'updateuser'])->name('updateaccount');

    Route::get('search',[SanphamController::class,'search'])->name('search');
    Route::get('/brand/{brand}',[SanphamController::class,'productsByBrand'])->name('brand');
    


});
Route::post('/vnpay_payment',[HoadonController::class,'vnpay_payment'])->name('thanhtoan');

Route::get('/dangxuat',[TaikhoanController::class, 'logout'] )->name('dangxuat');

Route::post('/hehe',[TaikhoanController::class,'xu_li_dang_nhap'])->name('xu_li_dang_nhap');


Route::get('/admin.formthemchitietsanphamrieng',[SanphamController::class, 'layallsanpham1'])-> name('trangthemspr');
Route::post('/admin.formthemchitietsanphamrieng',[SanphamController::class,'themsanphamrieng'])-> name('themspr');

Route::get('/admin.formthemhinhanh',[SanphamController::class,'pagehinhanh'])->name('sanpham');



Route::post('/Add-Cart', [CartController::class,'AddCart'])->name('addcart');
Route::get('/index-cart', [CartController::class,'indexcart'])->name('indexcart');   

Route::post('/removeitem/{id}', [CartController::class,'removeitem'])->name('removeitem');
    
// Route::post('/removeitem/{id}', function () { return 'Hello World'; })->name('removeitem');   




Route::get('/admin.formchinhsuachitietsanphamrieng/{id}',[ChitietspriengController::class,'formsuactsprchitiet'])->name('suactsprct');

Route::get('/admin.formxoachitietsanphamrieng/{id}',[ChitietspriengController::class,'formxoactsprchitiet'])->name('xoactsprct');

Route::post('/Suachitiet',[ChitietspriengController::class,'chinhsuachitietspr'])->name('Suachitiet');

Route::get('/xoa1dong/{id}',[ChitietspriengController::class,'xoa1'])->name('xoa1dong');



