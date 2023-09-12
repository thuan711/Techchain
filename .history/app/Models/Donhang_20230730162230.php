<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;
    protected $table ="donhang"; 
    public $primaryKey = "id_dh";
    public $timestamps = true;  
    protected $fillable = ['id_dh', 'thoidiemmua', 'tennguoinhan','email','dienthoai', 'diachigiaohang', 'trangthai', 'tongtien', 'id_user'];
    protected $dates = ['thoidiemmua'];
    protected $attributes= ['tongtien'=>0];
}
