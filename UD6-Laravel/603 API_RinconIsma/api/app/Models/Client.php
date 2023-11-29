<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function services()
    {
       // return $this->belongsToMany(Service::class);
        //un cliente tiene diferentes servicios
        //porque como no le hemos puesto las tablas en singular, hay que especificarlo
        //video min 55.13
        return $this->belongsToMany(Service::class, 'clients_services');

    }
}
