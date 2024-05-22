<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;


    /**
     * 
     * 
     * @var string
     */

    protected $table = 'table_items';

    /*
    *
    *
    * @var array 
    */
    protected $fillable = [
        'Mabec',
        'description',
        'prix',
    ];
}
