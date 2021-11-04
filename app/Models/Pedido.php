<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pedido extends Model
{
    use HasFactory;

    protected $appends = ['dias'];

    protected $casts = [
        'fecha_pedido' => 'datetime:d/m/Y',
    ];


    public function getDiasAttribute()
    {
        $fecha=$this->fecha_pedido;
        $dias=Carbon::now()->diff($fecha)->days; 
        return $dias;
    }



    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }



    
}
