<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return $clients to json response
        //devolvermos todos los clientes
        $clients=Client::all();

        $array=[];//1:06 creando un array de objetos para poder devolver la tabla pivote
        foreach ($clients as $client){
            $array[]=[
                'id'=>$client->id,
                'name'=>$client->name,
                'mail'=>$client->mail,
                'phone'=>$client->phone,
                'address'=>$client->address,
                'services'=>$client->services
            ];
        }
        //return response()->json($clients);
        return response()->json($array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Esto sirve para un monolito, no es nuestro caso.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vamos a completar el store.
        //Esto es una api que va a pintar el formulario, pero NO está aqui.
        $client =new Client;
        $client->name = $request->name;
        $client->mail = $request->mail;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Client created successfully',
            'client' => $client
        ];
        //return response()->json($client);
        return response()->json($data);
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        if(!$client){
            return response()->json(
                ['message'=>'Client not found']
            );
        }
        //si por la petición mandamos un cliente, lo mostramos
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //No hace falta, al igual que el create porque NO lo vamos ap pintar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->name = $request->name;
        $client->mail = $request->mail;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Client update successfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // muy sencillo, recibimoscliente aborrar
        $client->delete();

        //buena práctica, devolver el cliente
        //tutorial crea en vez de cliente un array data con más info
        $data = [
            'message' => 'Client deleted successfully',
            'client' => $client
        ];
        return response()->json($data);
    }

    //nueva función creada en el min 51. del video para las relaciones Cliente Servicio
    public function attach(Request $request)
    {
        //
        $client = Client::find($request->client_id);
        $client->services()->attach( $request->service_id);

        /*
        $client->mail = $request->mail;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();*/
 
        $data = [
            'message' => 'Service attached successfully',
            'client' => $client
        ];
        return response()->json($data);
    }



    //nueva función creada en el min 1:08. del video para las relaciones Cliente Servicio
    public function detach(Request $request)
    {
        //
        $client = Client::find($request->client_id);
        $client->services()->detach( $request->service_id);

            $data = [
            'message' => 'Service detached successfully',
            'client' => $client
        ];
        return response()->json($data);
    }
}
