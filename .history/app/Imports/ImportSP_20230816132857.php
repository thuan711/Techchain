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
            //
        ]);
    }
}
