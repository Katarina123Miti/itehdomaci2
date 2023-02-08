<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sudija extends Model
{
    use HasFactory;

    protected $table='sudijas';

    public $primaryKey='id';
}
