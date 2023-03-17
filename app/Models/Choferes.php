<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choferes extends Model
{
    use HasFactory;

    protected $connection = 'pgsqlDash';

    public function user(){
        return $this->hasOne(User::class, 'documento', 'document');
    }

    public function planes(){
        return $this->belongsToMany(Planes::class, 'choferes_moviles_planes', 'choferes_id', 'planes_id')
            ->where('planes.fecha', date('Y-m-d'))
            ->withPivot(['viaje', 'moviles_id'])
            ->withTimestamps()
            ->orderByPivot('viaje', 'asc');
            ;
    }
}
