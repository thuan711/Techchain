<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietsp extends Model
{
    use HasFactory;
    protected $table ="sanphamchitiet"; 
    public $primaryKey = "id_ct";
    public $timestamps = true;  
    protected $fillable = ['id_ct', 'RAM', 'CPU', 'Dia', 'Mausac', 'Cannang', 'mota', 'id_sp'];
    protected $attributes= ['Cannang'=>0];
}
