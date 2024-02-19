<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'taikhoans';
    protected $fillable = [
        'id',
        'taikhoan',
        'email',
        'matkhau',
      
       
        'isadmin',
        'tokenmatkhau',
        'remember_token',
        
    ];

    public function getAuthPassword()
    {
        return $this->matkhau;
    }
    // protected $hidden = [
    //     //'matkhau',
    //     //'remember_token',
    // ];
   
}
