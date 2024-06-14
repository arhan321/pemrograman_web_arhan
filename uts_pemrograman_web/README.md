Arhan malik alrasyid (20220801151) 
sistem CRUD untuk menunjang Showroom Mobil 

karena disini saya memakai src-template, jadinya saya tidak mulai dari composer create-project larave/laravel .
langkah langkah saya dalam membuat fitur. 
1. composer update
1. langkah pertama atur di bagian .env
2. atur mysql_host, sesuaikan dengan container mysql, lalu kasih nama db untuk project laravel ini.
3. setelah itu saya hapus fitur yang tidak di perlukan
5. setelah itu lakukan php artisan key:generate
6. php artisan make:model -m Products
7. php artisan make:controller ProductController
8. php artisan make:request MassDestroyProductRequest.php
9. php artisan make:request StoreProductRequest.php
10. php artisan make:request UpdateProductRequest.php
11. isi migration Product
12. isi Model Product
13. Atur Product Controller
14. setelah itu mengatur roles
15. setelah itu menambahkan seeders untuk akses (CRUD)
16. setelah itu membuat frontend(CRUD) untuk admin.
17. setelah itu atur route nya

HAPPY CODDING !!!!
