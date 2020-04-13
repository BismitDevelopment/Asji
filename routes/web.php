<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// // Punya Apis
// // Events Route
// Route::get('/event', 'EventController@index');
// Route::get('/event/{id}/post', 'EventController@show');

// // Events Admin Route
// Route::get('/event/admin', 'EventController@indexAdmin');
// Route::get('/event/admin/{id}/post', 'EventController@showAdmin');
// Route::delete('/event/admin/{id}/post', 'EventController@destroy');
// Route::get('/event/admin/add', 'EventController@create');
// Route::post('/event/admin/add', 'EventController@store');
// Route::get('/event/admin/{id}/edit', 'EventController@edit');
// Route::post('/event/admin/{id}/edit', 'EventController@editPhoto');
// Route::patch('/event/admin/{id}/edit', 'EventController@update');


// // News Route
// Route::get('/news', 'NewsController@index');
// Route::get('/news/{id}/post', 'NewsController@show');

// Route::get('/news/admin', 'NewsController@indexAdmin');
// Route::get('/news/admin/{id}/post', 'NewsController@showAdmin');
// Route::delete('/news/admin/{id}/post', 'NewsController@destroy');
// Route::get('/news/admin/add', 'NewsController@create');
// Route::post('/news/admin/add', 'NewsController@store');
// Route::get('/news/admin/{id}/edit', 'NewsController@edit');
// Route::patch('/news/admin/{id}/edit', 'NewsController@update');


Auth::routes();

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::resource('profiles', 'ProfileController')->except([
    'delete', 'create',
]);

Route::resource('journals', 'JournalController')->only([
    'index', 'show',
    ])->middleware([
        'auth',
        'can:is_member'
        ]);

Route::get('documents/{document}/show', function(App\Document $document){
    return view('showpdf', compact('document'));
})->name('show_pdf')->middleware('auth','can:is_member');

Route::resource('lectures', 'PublicLectureController')->only([
    'index', 'show'
]);

Route::resource('events', 'EventController')->only([
    'index', 'show'
]);

Route::get('/', 'NewsController@index')->name('home');

Route::resource('news', 'NewsController')->only([
    'show'
]);


Route::group([
    'prefix'=>'admin', 
    'as' => 'admin.',
    'middleware'=> ['auth', 'can:is_admin'],
], function(){

    Route::resource('events', 'EventController')->except([
        'index', 'show'
    ]);

    Route::resource('news', 'NewsController')->except([
        'index', 'show'
    ]);

    Route::resource('publicLectures', 'PublicLectureController')->except([
        'index', 'show',
    ]);

    Route::resource('journals', 'JournalController')->except([
        'index', 'show',
    ]); 
});