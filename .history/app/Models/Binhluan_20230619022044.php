<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;
    protected $table ="binhluan"; 
    public $primaryKey = "id_bl";
    public $timestamps = true;  
    protected $fillable = ['id_sp','id_user', 'noidung', 'thoidiem'];
}
