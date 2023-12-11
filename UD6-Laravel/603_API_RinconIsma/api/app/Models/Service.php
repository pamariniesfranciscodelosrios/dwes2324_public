<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function clients()
    {   //añadimos correctamente el nombre de la tabla pivote para que no falle 1:11
        return $this->belongsToMany(Client::class,'clients_services'); 

        //un servicio tiene diferentes servicios
        //Si el nombre de la tabla no es igual a cómo especifica Laravel, hay que indicarlo aquí para los ID. min 17
    }
}
