<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiario;

class Tarjeta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tarjeta';
    protected $table = 'tarjetas';

    public function beneficiario(){
        return $this->belongsTo(Beneficiario::class, 'id_beneficiario', 'id_beneficiario');
    }

    public function pagos(){
        return $this->hasMany(Pago::class);
    }
}
