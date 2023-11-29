<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services=Service::all();
        return response()->json($services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $service =new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Service created successfully',
            'service' => $service
        ];
        //return response()->json($client);
        return response()->json($data);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
        if(!$service){
            return response()->json(
                ['message'=>'Service not found']
            );
        }
        //si por la petición mandamos un cliente, lo mostramos
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Service update successfully',
            'service' => $service
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        // muy sencillo, recibimoscliente aborrar
        $service->delete();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Service deleted successfully',
            'service' => $service
        ];
        return response()->json($data);
    }

     /**
     * tuto 1:10 para saber cuantos servicios tiene un cliente 
     */
    public function clients(Request $request)
    {
        $service=Service::find($request->service_id);
        $clients = $service->clients;


        $data = [
            'message' => 'Clients fetched successfully',
            'clients' => $clients
        ];
        return response()->json($data);
    }
}
