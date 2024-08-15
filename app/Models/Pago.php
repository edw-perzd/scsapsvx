<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $primaryKey = 'id_pago';

    protected $table = 'paga';
}
