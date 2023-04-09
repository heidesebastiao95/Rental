<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cliente(){ return $this->belongsTo(User::class,'user_id');}
    public function carro() {return $this->belongsTo(Carro::class,'carro_id');} 
}
