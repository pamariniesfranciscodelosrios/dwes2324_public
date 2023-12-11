<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        Schema::create('clients_services', function (Blueprint $table) {
            $table->id(); //defecto
            //añadimos los campos que necesitamos en la tabla pivote clientes-servicios
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');//foreign key
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');//foreign key
            
            $table->timestamps();//defecto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_services');
    }
};
