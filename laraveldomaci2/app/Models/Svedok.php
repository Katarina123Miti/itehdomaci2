<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\KrivicnoDelo;
use App\Models\Sudija;

class Svedok extends Model
{
    use HasFactory;

    protected $table='svedoks';

    public $primaryKey='id';

    public function userkey() {
        return $this->belongsTo(User::class, 'user');
    }

    public function krivicnodelokey() {
        return $this->belongsTo(KrivicnoDelo::class, 'krivicnodelo');
    }

    public function sudijakey() {
        return $this->belongsTo(Sudija::class, 'sudija');
    }
    protected $fillable = [
        'datumIVreme',
        'krivicnodelo',
        'sudija',
        'user',
        'note'
    ];
}
