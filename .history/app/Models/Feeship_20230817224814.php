<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    protected $table ="feeship"; 
    public  $primaryKey = "fee_id";
    public  $timestamps = true;  
    protected $fillable = ['fee_matp', 'fee_maqh','fee_xaid','fee_ship']; 
}
