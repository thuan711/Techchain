<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    use HasFactory;
    protected $table ="devvn_tinhthanhpho"; 
    public  $primaryKey = "maqh";
    public  $timestamps = true;  
    protected $fillable = ['name', 'type']; 
}
