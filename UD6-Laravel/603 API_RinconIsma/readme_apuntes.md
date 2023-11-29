INDICE:
<?php

https://www.youtube.com/watch?v=D_whQwqXfoc
Cómo crear una API REST en LARAVEL desde 0

El rincón del isma

1 actividad: seguir un tutorial de menos de dos horas y crear diapositivas presentacion 


PASOS TUTORIAL:
composer create-project laravel/laravel api
mysqladmin -u root create api, en mi caso, me he creado la bbdd api              
php artisan make:model Client -mcr   
php artisan make:model Service -mcr   

HABRÁ TABLA PIVOTE POR RELACION MUCHOS A MUCHOS Y 
CREAMOS MIGRACION
php artisan make:migration create_clients_services_table
Lo de create_  --- _table es para que LARAVEL lo automatice.

 //Añadimos los campos extra que necesitamos a la tabla CLientes (databases)
   //Añadimos los campos extra que necesitamos a la tabla
            $table->string('name');
            $table->string('mail')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

 *//ENTREVISTA: API REST Y CÓMO CONSUMIRLA

  //Añadimos los campos extra que necesitamos a la tabla SERVICES 
                    $table->string('name'); //por defecto
                    $table->string('description')->nullable();
                    $table->integer('prince')->nullable();
                    $table->timestamps(); //por defecto

//LUMEN: 
Eliminar las vistas si se trabaja en API - Backend? SI.
Laravel propone LUMEN: Framework de Laravel sin Blade (Plantillas/front) min 11.49
Recomendación? dejar si no tenemos problemas de peso en servidor

//12,30 Tabla pivote min 
Manual - Relaciones 
     //añadimos los campos que necesitamos en la tabla pivote clientes-servicios
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');//foreign key
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');//foreign key

relaciones que propone laravel
Manual: Database Migrations: Muchos-muchos.. Has Many through
usuario puede tener mucho roles y roles pertenecer a varios usuarios
https://laravel.com/docs/10.x/eloquent-relationships#has-many-through
public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
Pegar en APP Model Client - cambiando roles por services
  public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
        //un cliente tiene diferentes servicios
    }

Ya tenemos relaciones creadas: clientes de un servicio y viceversa.
17.40 Creamos controladores
Al decir crear modelo con mcr, tenemos estructura básica pero falta funcionalidad
HTTP/Controllers Client y Service
El index nos va a devolver todos.

18.30: Tener en cuenta que Laravel piensa en Monolito, pero esto NO va a pintar nada, solo se va a encargar de servir.
entonces no va a pintar vistas. No es un return view (Porque copilot le sugiere return view..)
Va a pintar con respuestas http

Comentario que COPILOT  traduce a código: 
ADVERTENCIA ANTONIO: (cuidado con abusar de IA, mientras más IA usemos, menos pensamos)
Si os queréis diferenciar del resto (y deberíais), NO debéis hacer lo mismo.
3 errores al aprender a programar
https://www.youtube.com/shorts/8b3Z7NleAQM?feature=share


ADVERTENCIA ISMA: Copilot es muy bueno.. pero a veces el código que os propone, puede que no os funcione. Y "pete" toda la app
Hay que saber lo que queremos hacer, verbos...

//return $clients to json response
return response()->json($clients);

 public function index()  //ClientController
    {
        //return $clients to json response
        //devolvermos todos los clientes
        $clients=Client::all();
        return response()->json($clients);
    }


min 20 EJECUTAMOS PARA MIGRAR LAS TABLAS A NUESTRA BBDD
php artisan migrate

   INFO  Running migrations.  

  2023_11_23_080739_create_services_table ................................................................................................ 18ms DONE
  2023_11_23_081433_create_clients_services_table ........................................................................................ 47ms DONE


//Recomienda cliente Postman. Nosotros thunder client
ahora son endpoints publicos, sencillos
luego se hará privados y publicos, con autenticación, token...

Probamos. ejhecutamos laravel: 
php artisan serve

Comentamos las vistas y ponemos un echo API
routes/web.php
Route::get('/', function () {
   // return view('welcome'); //Quitamos las vistas
   echo "API REST";
});


26.29: dónde tratamos las API? se podrían hacer en routes/web.php
pero como laravel tiene una estructura bien definida, lo hacemos en routes/api.php


POSTMAN/Cliente: Headers que acepte JSON
KEY accept
VALUE application/json

en BODY/RAW podemos mandar o no cosas, como es peticion get no es necesario

28.26 qué ponemos en GET dirección?:GET http://127.0.0.1:8000/api/clients

incluimos en routes/api.php
Route::get('/clients','App\Http\Controllers\ClientController@index' );

Nos devuelve cada uno de los clients, si ejecutamos la peticion GET, en formato JSON, 
Este formato es con lo que trabaja los clients como VUE, React...

min 30
Hasta ahora solo tenemos clientes, vamos a completarlo
Create no lo vamos  a utilizar porque es para una web completa, formulario...

vamos a completar el store.
Esto es una api que va a pintar el formulario, pero NO está aqui.

31.24 en ClientController:
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
        ]
        ;
        //return response()->json($client);
        return response()->json($data);
        

    }


El SHOW,muy sencillo
   //si por la petición mandamos un cliente, lo mostramos
        return response()->json($client);



El edit //No hace falta, al igual que el create porque NO lo vamos ap pintar

El UPDATE si lo necesitamos, igualque el store
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


    y porultimo el destroy, muy sencillo
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

    32.33 porque no trabajamos con ids¿??
    porque debemos devolver y trabajar con los verbos HTTP al ser una API
    store POST
    show con GET
    update con PUT
    destroy con delete 


    33 ahora vamos a crear todas las rutas  (routes / api)
    Route::get('/clients','App\Http\Controllers\ClientController@index' );
    Route::post('/clients','App\Http\Controllers\ClientController@store' );
    Route::get('/clients/{client}','App\Http\Controllers\ClientController@show' );
    Route::put('/clients/{client}','App\Http\Controllers\ClientController@update' );
    Route::delete('/clients/{client}','App\Http\Controllers\ClientController@destroy' );

    34,00 vamos acrear un nuevo cliente desde el clienteAPI
    en método usamos POST
    en Headers igual que antes
    VALUE application/json
    y en BODY / raw elegimos JSON y escribimos:

ponemos las keys de nuestro modelo (name, mail..) 
{
    "name": "AUDI-COCHES",
    "mail":"audi@gmail.com",
    "phone":"5642139",
    "address":"calle pepe 12"
}

ademas en el metodo post nos devuelve el id, el created  y el updated además del mensaje de OK
STATUS 200 ok
{
    "message": "Client created successfully",
    "client": {
      "name": "AUDI-COCHES",
      "mail": "audi@gmail.com",
      "phone": "5642139",
      "address": "calle pepe 12",
      "updated_at": "2023-11-24T09:45:56.000000Z",
      "created_at": "2023-11-24T09:45:56.000000Z",
      "id": 2
    }
  }

37.00 
ahora nos faltaria el GET del cliente
le tengo que mandar un cliente (id)
si funciona, nos devuelve el cliente
para esto no tenemps que mandar nada, solo el id dentro de la URL

http://127.0.0.1:8000/api/clients/1

Nos devuelve el cliente1
{
    "id": 1,
    "name": "BMW",
    "mail": "bmw@test.com",
    "phone": "9456324",
    "address": "Calle sin numero",
    "created_at": "2023-11-24T06:56:09.000000Z",
    "updated_at": "2023-11-24T06:56:09.000000Z"
  }

  38.16 Si le mando el 3 nos da error. ahora hay que comenzar a trabajar con errores y validaciones

  Nos vamos al show clientController
  esto vuelve al final, da error. En teoria esto no lo puede hacer API

  39.32 Muestra todos los clientes 
  GET http://127.0.0.1:8000/api/clients
  devuelve Un array con todos

  40. 00 falta actualizar un cliente
  
PUT http://127.0.0.1:8000/api/clients/2
  {
    "name": "RENAULT-AVIONES",
    "mail":"audi@gmail.com",
    "phone":"5642139",
    "address":"calle pepe 12"
  }

  Los verbos HTTP son muy importante y todos los clientes, react, vue... trabajan con ellos


  Introduce un tercer coche (ford)

  43.07 nos queda borrar y lo hacemos con DELETE
  DELETE locahost/api/clients/3


  44.25 ahora va a hacer SERVICIOS
  Hacemos lo mismo pero con los servicios (lo hace copilot)
  primero el Controlador:
  public function index()
  {
      //
      $services=Service::all();
      return response()->json($services);
  }

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


  en API:
  // para los Servicios
{
    Route::get('/services','App\Http\Controllers\ServiceController@index' );
    Route::post('/services','App\Http\Controllers\ServiceController@store' );
    Route::get('/services/{service}','App\Http\Controllers\ServiceController@show' );
    Route::put('/services/{service}','App\Http\Controllers\ServiceController@update' );
    Route::delete('/services/{service}','App\Http\Controllers\ServiceController@destroy' );
}

DE NUEVO, ADVERTENCIA COPILOT:
Es muy bueno para estas cosas SIEMPRE Y CUANDO SEPÁIS LO QUE ESTÁIS HACIENDO
Si no: Hacerlo a mano.
ADVERTENCIA ANTONIO: en la entrevista de trabajo, no lo explica Copilot.

Hecho tdo lo anterior, probamos services
GET http://127.0.0.1:8000/api/services
OK

POST http://127.0.0.1:8000/api/services
{
    "name":"Pagina Web",
    "description": "Creación de página web",
    "price":100
  }


  Asi con el resto de peticiones
  GET http://127.0.0.1:8000/api/services/2

  UPDATE

  DELETE ok
  http://127.0.0.1:8000/api/services

  50,00
  Tenemos clientes y servicios, qué falta??
  PODER asignar SERVICIOS a CLIENTES

  AHORA VAMOS  A VER COMO TRABAJAR CON LAS RELACIONES

  En la api.php, creamos una nueva ruta attach
  Route::post('/clients/service','App\Http\Controllers\ClientController@attach' );


Tenemos en la ruta de API una ruta que recibe algo, y vamos a añadir un cliente a un servicio

Nos vamos al client Controller y 
creamos funcion nueva. Recibe request y cliente

public function attach(Request $request, Client $client) 
    {
        //
        $client = Client::find($request->client_id);
        $client->services()->attach( $request->service_id);
 
        $data = [
            'message' => 'Service attached successfully',
            'client' => $client
        ];
        return response()->json($data);
    }



52.20 Una vez hecho, hacemos esa ruta en el postman/cliente thunder client ...
POST http://127.0.0.1:8000/api/clients/service
{
    "service_id":1,
    "client_id":1
  }


falla por el nombre de la base dea dtos, en el modelo
Client model:
public function services()
{
   // return $this->belongsToMany(Service::class);
    //un cliente tiene diferentes servicios
    //porque como no le hemos puesto las tablas en singular, hay que especificarlo
    //video min 55.13
    return $this->belongsToMany(Service::class, 'clients_services');

}
OK
"message": "Service attached successfully",


Min 55.15 
Ahora mismo, NO estamos viendo cuando mostramos los clientes si tiene servicios
Estaría bien...
Se puede trabajar con MAPEOS, servicios de laravel..
Nos piden que a la vez que devolvamos clientes devolvamos también sus servicios

min 57.22
Buscamos en google cómo devolver las tablas pivote
esto es devolver los clientes, y los servicios que tiene ese cliente.

busqueda: "Model ORM laravel response with pivot table"
"return response model orm laravel with pivot table"
"json map response laravel" mapping.

Eloquent ORM Laravel
Queremos devolver en un solo cliente.
Buscamos en la documentacion de tablet withPivot
Buscamos los MAPEOS. que no son sencillos de comprender al principio.
Ruta ClientController metodo show ampliamos el return con withPivot.
No encuentra lo que busca de primeras y lo va a hacer creando un array de objetos en el método index del clientController:
ClientController:
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

//1:07 Va a hacer el detach. En el fichero api crea la función

Route::post('/clients/service/detach','App\Http\Controllers\ClientController@detach' );//Quita un servicio a una función

y en ClientController hace lo mismo.
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

//lo prueba;   "client detach succesfully, con el GET Client index antes y después lo conprueba
1:09 RESUMEN
Hemos hecho una pequeña API
- crear clientes
- mostrar clientes
- actualizar
- borrar

- crear, mostrar, actualizar, borrar servicios
añadir servicios a clientes y quitarlos-

//Ahora la cuestión es:¿CUANTOS CLIENTES TIENE UN SERVICIO?
1:09
creamos la función primero en la api y luego en ServiceController

//Para saber CUANTOS CLIENTES TIENE UN SERVICIO, creamos la función clients (GET)
Route::post('/services/clients','App\Http\Controllers\ServiceController@clients' ); 

ahora en ServiceController
//cuidado porque la tabla Service hay que completarla al igual que en client (modelo) para que no falle
//que solo es el nombre de la tabla PIVOT correcto
//En public function clients(), añadimos clients service
  return $this->belongsToMany(Client::class,'clients_services'); 

  Creamos la peticion post
  POST http://localhost:8000/api/services/clients
ENVIAMOS: 
{
    "service_id":1
  }

//COMPLETO, Qué falta?
Está en GITHUB.
hay tuto que laravel, con BLADE que hace peticiones peticiones a esta API
Falta login, tokens y SECURIZAR.

más sencilla con token, id ... y enviarlo en las peticiones
aunque no es del todo seguro. lo ideal es login con Laravel Fortify, autenticación que trabaja con tokens de autenticación
Habrá un middleware que comprueba que yo estoy autenticado, estos tokens se suelen llamar BEARER

Se manda en una cabecera especial de autorización... que solo se podrá ejecutar si se envia y está correcto este token

PROYECTO LARAVEL:
interfaz minimalista, 
lista clientes,
boton cliente
formularios crear, actualizar..
Al final securizaremos una de las llamadas para comprobar que pasa si no tengo un login













