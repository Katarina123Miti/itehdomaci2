<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Svedok;

class KrivicnoDelo extends Model
{
    use HasFactory;
    protected $table='krivicno_delos';

    public $primaryKey='id';

    public function svedok() {
        return $this->hasMany(Svedok::class);
    }
    protected $fillable = [
        'naziv',
    ];
}
