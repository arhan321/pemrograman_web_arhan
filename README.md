web pemrogramming using freamwork laravel 

CLI dasar untuk bekal :

cd (masuk file)

rm -r (hapus file)

mkdir (membuat file)

cp -r (copy file)

mv [namafile] to [namafile] (untuk mengganti nama file)

mv [namafile] to direktory (mindahin file)

CLI docker : 
di dalam file yang ada docker-compose.yml nya silahkan up container nya (docker compose up -d --build)

jika containernya ada masalah silahkan (docker compose down) (sekaligus jika ingin menghilangkan containernya)

setelah itu (docker exec -it (nama container php nya) bash)

setelah itu silahkan pada var/www/html nya generate composerr nya 

and happy coding !!!!!!

LARAVEL COMPOSER , BLUEPRINT AND REST API 

composer create-project laravel/laravel .

composer require -W --dev laravel-shift/blueprint

untuk blueprint :
- list nya : php artisan blueprint list

- blueprint:build  Build components from a Blueprint draft
- 
  blueprint:erase  Erase components created from last Blueprint build
  
  blueprint:init   An alias for "blueprint:new" command
  
  blueprint:new    Create a draft.yaml file and load existing models

  blueprint:stubs  Publish blueprint stubs
  
  blueprint:trace  Create definitions for existing models to reference in new drafts

setelah ini bisa langsung membuat draft.yml nya : 

contoh nya : 

models:

  Post:
  
    title: string:400
    content: longtext
    published_at: nullable timestamp

controllers:

  Post:
    index:
      query: all
      render: post.index with:posts

    store:
      validate: title, content
      save: post
      send: ReviewNotification to:post.author with:post
      dispatch: SyncMedia with:post
      fire: NewPost with:post
      flash: post.title
      redirect: post.index


- mv .env.example .env
- nano .env 
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=implement
DB_USERNAME=root
DB_PASSWORD=p455w0rd
ctrl+x terus y terus enter
- php artisan key:generate
- php artisan migrate
- php artisan storage:link
- chmod 777 -R storage/*

REST API LARAVEL:

install lumen : 

composer create-project --prefer-dist laravel/lumen nama-proyek-anda

fix lumen jika lumen terkena masalah version : 

composer require --with-all-dependencies flipbox/lumen-generator

after composer lumen app.php :

$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

install swagger:

composer require "darkaonline/l5-swagger"

vendor publish : 

php artisan vendor:publish --provider "L5swagger\L5swaggerServiceProvider"


