<?php
namespace App\Imports;

use App\Models\items;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new items([
            'Mabec' => $row[0],
            'description' => $row[1],
            'prix' => $row[2] 
        ]);
    }
}
