# membuat lumen api laravel
``` 
composer create-project laravel/lumen .

```
jika sudah melakukan composer silahkan untuk sesuaikan pada db nya .env

silahkan lakukan flipbox lumen generator

```
composer require --with-all-dependencies flipbox/lumen-generator

```

setelah itu set di bootstrap/app.php

```
$app->withFacades();
$app->withEloquent();
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

```
setelah itu silahkan lakukan 

```
php artisan key:generate

```

setelah itu hapus terlebih dahulu controller model dan migration seeders serta factory bawaan nya lumen (users)

setelah itu promt 

``` 
php artisan make:model User -mcfs --resource

```

set di controller 

```
    public function index(){
        $query = DB::connection('mysql')->table('users')->get(['username', 'password']);
        return response()->json($query, 200);
    }

```

set di model 

```
    protected $connection = 'mysql';
    protected $fillable = ['username', 'password'];
    
```

set di migration

```
     Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });

```


set di seeders 

```
  public function run()
    {
        $this->call([UserSeeder::class,]);
    }

```

setelah itu lakukan 

```
php artisan migrate

```

```
php artisan db:seed

```
