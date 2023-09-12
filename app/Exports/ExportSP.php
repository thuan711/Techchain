<?php

namespace App\Exports;

use App\Models\Sanpham;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSP implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sanpham::all();
    }
}
