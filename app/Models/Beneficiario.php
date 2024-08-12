<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarjeta;

class Beneficiario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_beneficiario';

    protected $table = 'beneficiarios';

    public function tarjeta(){
        return $this->hasOne(Tarjeta::class, 'id_beneficiario', 'id_beneficiario');
    }
}
