<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items4 extends Model
{
    use HasFactory;

    protected $table = 'table_items_4';

    protected $fillable = [ 'Mabec',
    'description',
    'prix',];
}
