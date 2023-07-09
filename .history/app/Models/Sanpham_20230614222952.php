<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table ="sanpham"; 
    public $primaryKey = "id_sp";
    public $timestamps = true;  
    protected $fillable = ['id_sp', 'ten_sp', 'gia', 'giakm', 'anhien', 'tinhchat', 'soluotxem', 'hot', 'mota', 'hinh', 'ngay', 'id_loai'];
    protected $dates = ['ngay'];
    protected $attributes= ['soluotxem'=>0, 'hot'=>0, 'hinh'=>''];
}
