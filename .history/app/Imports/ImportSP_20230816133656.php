<?php

namespace App\Imports;

use App\Models\Sanpham;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSP implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sanpham([
            'ten_sp' => $row[0],
            'gia' => $row[1],
            'gia_km' => $row[2],
            'ngay' => $row[3],
            'soluotxem' => $row[4],
        ]);
    }
}
