<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrivicnoDelo extends Model
{
    use HasFactory;
    protected $table='krivicno_delos';

    public $primaryKey='id';
}
