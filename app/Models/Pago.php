<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarjeta;

class Pago extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $primaryKey = 'id_pago';

    protected $table = 'pago';

    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class, 'id_tarjeta', 'id_tarjeta');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
