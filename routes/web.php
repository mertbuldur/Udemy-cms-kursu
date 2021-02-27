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



Auth::routes();
Route::group([
    'namespace'=>'front',
    'prefix'=>LaravelLocalization::setLocale(),
    'as'=>'front.',
    'middleware'=>[
        'localeSessionRedirect',
        'localizationRedirect',
    ]
],function (){
   Route::get('/','indexController@index')->name('index');
   Route::get('/lang/{lang}','indexController@lang')->name('lang');
   Route::post('/offer','indexController@offer')->name('offer');
   Route::post('/newsletter','indexController@newsletter')->name('newsletter');
   Route::group(['namespace'=>'page','as'=>'page.'],function (){
        Route::get(LaravelLocalization::transRoute('routes.page'),'indexController@index')->name('index');
   });


   Route::get('/sitemap.xml','indexController@sitemap');


   Route::group(['namespace'=>'blog','as'=>'blog.'],function (){
      Route::get(LaravelLocalization::transRoute('routes.blog'),'indexController@index')->name('index');
      Route::get(LaravelLocalization::transRoute('routes.blog_category'),'indexController@category')->name('category');
      Route::get(LaravelLocalization::transRoute('routes.blog_search'),'indexController@search')->name('search');
      Route::get(LaravelLocalization::transRoute('routes.blog_view'),'indexController@view')->name('view');
      Route::post(LaravelLocalization::transRoute('routes.blog_view'),'indexController@comment')->name('comment');

   });

   Route::group(['namespace'=>'service','as'=>'service.'],function (){
      Route::get(LaravelLocalization::transRoute('routes.service'),'indexController@index')->name('index');
   });

   Route::group(['namespace'=>'contact','as'=>'contact.'],function (){
      Route::get(LaravelLocalization::transRoute('routes.contact'),'indexController@index')->name('index');
      Route::post(LaravelLocalization::transRoute('routes.contact'),'indexController@store')->name('store');
   });
});



Route::group(['namespace'=>'api','as'=>'api.','prefix'=>'api'],function (){
   Route::post('/auto-slug','indexController@autoSlug')->name('autoSlug');
});
Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth']],function (){

    Route::get('/','indexController@index')->name('index');

    Route::group(['namespace'=>'setting','as'=>'setting.','prefix'=>'setting'],function (){
       Route::get('/','indexController@index')->name('index');
       Route::post('/','indexController@update')->name('update');
    });

    Route::group(['namespace'=>'slider','as'=>'slider.','prefix'=>'slider'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'comment','as'=>'comment.','prefix'=>'comment'],function (){
        Route::get('/answer/{id}','indexController@answer')->name('answer');
        Route::post('/answers/store/{id}','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
    });

    Route::group(['namespace'=>'referans','as'=>'referans.','prefix'=>'referans'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'team','as'=>'team.','prefix'=>'team'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'project','as'=>'project.','prefix'=>'project'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'newsletter','as'=>'newsletter.','prefix'=>'newsletter'],function (){
       Route::get('/','indexController@index')->name('index');
       Route::post('/data','indexController@data')->name('data');
       Route::get('/delete/{id}','indexController@delete')->name('delete');
    });


    Route::group(['namespace'=>'services','as'=>'services.','prefix'=>'services'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });

    Route::group(['namespace'=>'blogcategory','as'=>'blogcategory.','prefix'=>'blogcategory'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
    });

    Route::group(['namespace'=>'blog','as'=>'blog.','prefix'=>'blog'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
    });


    Route::group(['namespace'=>'language','as'=>'language.','prefix'=>'language'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
    });


    Route::group(['namespace'=>'page','as'=>'page.','prefix'=>'page'],function (){
        Route::get('/create','indexController@create')->name('create');
        Route::post('/store','indexController@store')->name('store');
        Route::get('/','indexController@index')->name('index');
        Route::post('/data','indexController@data')->name('data');
        Route::get('/edit/{id}','indexController@edit')->name('edit');
        Route::post('/update/{id}','indexController@update')->name('update');
        Route::get('/delete/{id}','indexController@delete')->name('delete');
        Route::post('/sortable','indexController@sortable')->name('sortable');
    });


});
