<?php

namespace App\Imports;

use App\Models\Items6;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImportp6 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Items6([
            'Mabec' => $row[0],
            'description' => $row[1],
            'prix' => $row[2]
        ]);
    }
}