<?php

namespace App\Imports;

use App\Models\Items13;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImportp13 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Items13([
            'Mabec' => $row[0],
            'description' => $row[1],
            'prix' => $row[2]
        ]);
    }
}