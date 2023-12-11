# 604 DemoLaravelApi
## Índice
1. [Introducción](#introducción)
2. [Instalación](#instalación)
3. [Installation](#installation)
4. [Collaboration](#collaboration)
5. [FAQs](#faqs)

## Introducción
Vamos a analizar el proyecto DemoLaravelApi para comprender cada uno de sus componenetes. Personalizaremos algunas de sus partes
Enlace repositorio: https://github.com/RafaTicArte/DemoLaravelAPI
Enlace tutorial de base: https://notasweb.me/entrada/crear-un-api-rest-en-laravel  


## Instalación

OPCIONAL: Instalación clonada de repositorio para probar y tenerlo como referencia (4/12/2023):

1. Clonamos el proyecto en la carpeta raiz htdocs

Lo hacemos así para poder usarlo en el módulo DWEC con Rafa Morales
 ```shell
    git clone https://github.com/RafaTicArte/DemoLaravelAPI.git
```

2. Leemos y seguimos el Readme.md que incorpora
 
 Los 7 puntos de la instalación
 Variables de entorno, generación KEY, Migraciones, BBDD ...

3. Arrancamos el servidor backend 
 ```shell
    php artisan serve
```

3. Abrimos nuestro cliente HTTP como Postman o ThunderClient y probamos todas las peticiones
 ```shell
    POST Login
    GET Books
    ... 
```

 
## Creación
Crearemos desde cero este proyecto para ver paso a paso cómo se realiza. (5/12/2023)  
Modificaremos algunos elementos para personalizarlo.

### Creación proyecto
Para cada uno de los pasos, tendremos información detallada con la base teórica en el tutorial.
Enlace tutorial de base: https://notasweb.me/entrada/crear-un-api-rest-en-laravel  

1. Create Proyect
Crearemos el proyecto dentro de la ruta ***``` UD6-Laravel / 604 DemoLaravelAPI***```*** 

    ```shell
        composer create-project laravel/laravel DemoLaravelAPI2  
    ```
    SALIDA CONSOLA:... INFO  Application key set successfully. 

2. Accedemos a la carpeta DemoLaravelAPI2

3. Creamos modelo
 ```shell
        php artisan make:model Book -cmf
```
SALIDA:  
   INFO  Model [app/Models/Book.php] created successfully.  

   INFO  Factory [database/factories/BookFactory.php] created successfully.  

   INFO  Migration [database/migrations/2023_12_05_055053_create_books_table.php] created successfully.  

   INFO  Controller [app/Http/Controllers/BookController.php] created successfully.  


### Modelo
1. Configuraremos primero el modelo Book:  
``` ruta: app/Models/Book.php```
```php
class Book extends Model
{
    use HasFactory;

    // Prepara el campo para almacenar formato JSON
    // https://laravel.com/docs/8.x/eloquent-mutators#array-and-json-casting
    protected $casts = [
        'extra' => 'array',
    ];

    protected $fillable = [
        'title',
        'description',
        'extra',
        'user_id',
    ];

    public $sortable = ['title',
        'description',
    ];

    public function getDescriptionAttribute($value)
    {
        return substr($value, 0, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 
```

2. Modificaremos el modelo user, agregándole el campo ROLE:  
``` ruta: app/Models/User.php```

```php
  protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
```

### Migraciones
1. Configuramos la migración del modelo Book con sus campos y su relación con el modelo User.  
``` ruta: database/Migrations/FECHA_create_books_table.php```

```php
public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->json('extra')->default('')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
```

1. Configuramos la migración del modelo User
 ``` ruta: database/Migrations/FECHA_create_users_table.php```

 ```php
 /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });
    }
 ```

### Factory
1. Factory para Book
``` ruta: database/factories/BookFactory.php```  
Configuramos el Factory de Book, para crear registros falsos que usaremos para realizar nuestras pruebas.  
El ID va a ser aleatorio entre ***100 y 150***


 
```php
 public function definition(): array /*vemos cómo las nuevas versiones de LARAVEL ya incorporan el valor devuelto con : */
    {
        return [
            'user_id' => rand(100, 150),
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
```

2. Factory para User
``` ruta: database/factories/UserFactory.php```  

```php
  public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            //'password' => static::$password ??= Hash::make('password'),  ORIGINAL
            'password' => Hash::make('password'),
            'role' => 2, //El rol 2 será para los usuarios y el 1 para el admin
            'remember_token' => Str::random(10),
        ];
    }
```



### seeders

```ruta: database/seeders/DatabaseSeeder.php```  
A continuación configuramos el Seeders para lanzar los Factories cuando ejecutemos las migraciones.  
Crearemos 3 usuarios y 6 libros  
el administrador será "admin" y la contraseña "password"

```php

    /**
     * Incorporamos, además de las que viene Seeder
     */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@dwes.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Book::factory(6)->create();
    }
```
***IMPORTANTE:*** 
Antes de ejecutar las migraciones, debemos tener nuestra base de datos creada y el archivo .env configurado hacía esa BD

### Base Datos
1. Creamos el archivo para la base de datos
```ruta: database/database.sqlite```
Configuraremos una base de datos con SQLite.
Creamos un nuevo archivo llamado ```database.sqlite``` vacío
Por comandos: 
```sh
LINUX: database.sqlite
WINDOWS: type nul > database/database.sqlite
```

2. Configuramos el fichero .env
Comentamos el bloque de conexión MYSQL y escribimos sqlite como motor base de datos
```sh
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
```

3. cuando lo tengamos copiamos el fichero .env en el .env.example para subir el repositorio
```sh
cp .env .env.example
```

### Migraciones
Generamos las migraciones con todos los datos de prueba que hemos configurado, ejecutando el comando:

```sh
php artisan migrate --seed
```

### API

## FAQs

***
A list of frequently asked questions
1. **This is a question in bold**
Answer of the first question with _italic words_. 
2. __Second question in bold__ 
To answer this question we use an unordered list:
* First point
* Second Point
* Third point
3. **Third question in bold**
Answer of the third question with *italic words*.
4. **Fourth question in bold**
| Headline 1 in the tablehead | Headline 2 in the tablehead | Headline 3 in the tablehead |
|:--------------|:-------------:|--------------:|
| text-align left | text-align center | text-align right |