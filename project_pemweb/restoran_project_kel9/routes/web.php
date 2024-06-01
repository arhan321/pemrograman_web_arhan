<?php
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\MidtransController;

//routing frontend untuk makan dittempat
Route::get('/qr', function () {
    return view('layouts.qrcode');
});
 Route::get('/makan', 'makan_tempat@getmakan')->name('layouts.makan_di_tempat.makan');
 

 Route::get('/reservasi', [OrderController::class, 'index'])->name('layouts.reservasi');
 Route::post('/checkout', [OrderController::class, 'checkout'])->name('midtrans.checkout');
 Route::post('/midtrans-callback', [OrderController::class, 'callback'])->name('midtrans.callback');
 Route::get('/order/{id}', [OrderController::class, 'showOrder'])->name('order.show');

//routing front end 
Route::get('/', 'frontend@home')->name('frontend.home');
 Route::get('/abouts', 'frontend@abouts')->name('frontend.about');
 Route::get('/menu', 'frontend@menu')->name('frontend.menu');
 Route::get('/signature', 'frontend@signature')->name('frontend.signature');
 Route::get('/testimonial', 'frontend@testimonial')->name('frontend.testimonial');
 Route::get('/galery', 'frontend@galery')->name('frontend.galery');
 Route::get('/chefs', 'frontend@chefs')->name('frontend.chefs');
//  Route::get('/contact', 'frontend@contact')->name('frontend.contact');
// Route::get('/chef', 'frontend@chef')->name('frontend.chef');
// Route::get('/contact', 'frontend@contact')->name('frontend.contact');
// Route::get('/reservasi', 'frontend@reservasi')->name('layouts.reservasi');
Route::get('/error', function () {
    return view('frontend.error');
});


//Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Sosial Media
    Route::delete('sosial-media/destroy', 'SosialMediaController@massDestroy')->name('sosial-media.massDestroy');
    Route::resource('sosial-media', 'SosialMediaController');

    // Footer
    Route::delete('footers/destroy', 'FooterController@massDestroy')->name('footers.massDestroy');
    Route::post('footers/media', 'FooterController@storeMedia')->name('footers.storeMedia');
    Route::post('footers/ckmedia', 'FooterController@storeCKEditorImages')->name('footers.storeCKEditorImages');
    Route::resource('footers', 'FooterController');

    // Profile
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::post('profiles/media', 'ProfileController@storeMedia')->name('profiles.storeMedia');
    Route::post('profiles/ckmedia', 'ProfileController@storeCKEditorImages')->name('profiles.storeCKEditorImages');
    Route::resource('profiles', 'ProfileController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

  
    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::resource('galleries', 'GalleryController');

    // Why us
    Route::delete('whys/destroy', 'WhyController@massDestroy')->name('whys.massDestroy');
    Route::post('whys/media', 'WhyController@storeMedia')->name('whys.storeMedia');
    Route::post('whys/ckmedia', 'WhyController@storeCKEditorImages')->name('whys.storeCKEditorImages');
    Route::resource('whys', 'WhyController');
  
    // Data Chef
    Route::delete('datachefs/destroy', 'DatacheffController@massDestroy')->name('datachefs.massDestroy');
    Route::post('datachefs/media', 'DatacheffController@storeMedia')->name('datachefs.storeMedia');
    Route::post('datachefs/ckmedia', 'DatacheffController@storeCKEditorImages')->name('datachefs.storeCKEditorImages');
    Route::resource('datachefs', 'DatacheffController');
     
    // Home
    Route::delete('homes/destroy', 'HomeAdminController@massDestroy')->name('homes.massDestroy');
    Route::post('homes/media', 'HomeAdminController@storeMedia')->name('homes.storeMedia');
    Route::post('homes/ckmedia', 'HomeAdminController@storeCKEditorImages')->name('homes.storeCKEditorImages');
    Route::resource('homes', 'HomeAdminController');
 
    // Tim
    Route::delete('tims/destroy', 'TimController@massDestroy')->name('tims.massDestroy');
    Route::post('tims/media', 'TimController@storeMedia')->name('tims.storeMedia');
    Route::post('tims/ckmedia', 'TimController@storeCKEditorImages')->name('tims.storeCKEditorImages');
    Route::resource('tims', 'TimController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Daftar Layanan
    Route::delete('daftar-layanans/destroy', 'DaftarLayananController@massDestroy')->name('daftar-layanans.massDestroy');
    Route::post('daftar-layanans/media', 'DaftarLayananController@storeMedia')->name('daftar-layanans.storeMedia');
    Route::post('daftar-layanans/ckmedia', 'DaftarLayananController@storeCKEditorImages')->name('daftar-layanans.storeCKEditorImages');
    Route::resource('daftar-layanans', 'DaftarLayananController');

    // Tables
    Route::delete('tables/destroy', 'TablesController@massDestroy')->name('tables.massDestroy');
    Route::post('tables/media', 'TablesController@storeMedia')->name('tables.storeMedia');
    Route::post('tables/ckmedia', 'TablesController@storeCKEditorImages')->name('tables.storeCKEditorImages');
    Route::resource('tables', 'TablesController');

    // Booking
    Route::delete('bookings/destroy', 'BookingController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingController');

    // Price
    Route::delete('prices/destroy', 'PriceController@massDestroy')->name('prices.massDestroy');
    Route::resource('prices', 'PriceController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

     // signature
     Route::delete('signatures/destroy', 'SignatureController@massDestroy')->name('signatures.massDestroy');
     Route::post('signatures/media', 'SignatureController@storeMedia')->name('signatures.storeMedia');
     Route::post('signatures/ckmedia', 'SignatureController@storeCKEditorImages')->name('signatures.storeCKEditorImages');
     Route::resource('signatures', 'SignatureController');
    

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
