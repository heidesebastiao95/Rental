<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function cliente()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class,'reserva_id');
    }
}
