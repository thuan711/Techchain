<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    use HasFactory;
    protected $table ="donhangchitiet"; 
    public $primaryKey = "id_ct";
    public $timestamps = true;  
    protected $fillable = ['id_ct', 'id_dh', 'id_sp', 'tensp', 'soluong', 'gia', 'mota'];
}
