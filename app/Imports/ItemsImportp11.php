<?php

namespace App\Imports;

use App\Models\Items11;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImportp11 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Items11([
            'Mabec' => $row[0],
            'description' => $row[1],
            'prix' => $row[2]
        ]);
    }
}