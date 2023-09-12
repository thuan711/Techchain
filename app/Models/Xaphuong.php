<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    use HasFactory;
    protected $table ="devvn_xaphuongthitran"; 
    public  $primaryKey = "xaid";
    public  $timestamps = true;  
    protected $fillable = ['name_xaphuong', 'type','maqh']; 
}
