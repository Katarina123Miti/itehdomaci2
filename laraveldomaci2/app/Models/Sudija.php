<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Svedok;

class Sudija extends Model
{
    use HasFactory;

    protected $table='sudijas';

    public $primaryKey='id';

    public function svedok() {
        return $this->hasMany(Svedok::class);
    }
    protected $fillable = [
        'ime',
        'email',
        'brojTelefona',
        'godineIskustva'
    ];
}
