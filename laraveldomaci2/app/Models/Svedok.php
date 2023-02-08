<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Svedok extends Model
{
    use HasFactory;

    protected $table='svedoks';

    public $primaryKey='id';
}
