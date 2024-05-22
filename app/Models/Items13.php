<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items13 extends Model
{
    use HasFactory;
    protected $table = 'table_items_13';

    protected $fillable = [ 'Mabec',
    'description',
    'prix',];
}
