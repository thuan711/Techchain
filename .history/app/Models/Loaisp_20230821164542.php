<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisp extends Model
{
    use HasFactory;
    protected $table ="loai"; 
    public  $primaryKey = "id_loai";
    public  $timestamps = true;  
    protected $fillable = ['id_loai', 'ten_loai','slug','thutu','anhien']; 
}
