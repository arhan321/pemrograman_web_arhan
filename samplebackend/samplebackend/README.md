STEP TESTING

COPY FILE .env.example jadikan .env

BUAT 3 DATABASE DI LOCALHOST DENGAN DETAIL
1. dbtransaction
2. dbcore
3. dbhistory

#UNTUK GENERATE KEY APP
php artisan key:generate

#UNTUK GENERATE DB
php artisan migrate

#UNTUK CREATE TOKEN API
php artisan db:seed

#UNTUK RUNNING
php artisan server

#UNTUK ADD PASSWORD TOKEN
lihat di database core table user ambil passwordnya
letakkan di postman pada menu Athorization 
dengan type API Key

isi key dengan password
isi value dengan password yang ada di dbcore table user
pilih Add to header

#URL FOR COSTUMER
URL http://localhost:8000/api/v1/cost

#URL FOR HISTORY
URL http://localhost:8000/api/v1/hist

#URL FOR TRANSACTION
URL http://localhost:8000/api/v1/trans

#URL FOR SAMPLE JOINDBTB
URL http://localhost:8000/api/v1/trans/detail
