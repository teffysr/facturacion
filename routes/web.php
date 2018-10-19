<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/empresas', 'CompanyController@index');
Route::get('crear-empresa', 'CompanyController@create');
Route::post('store-empresa', 'CompanyController@store');
Route::get('empresas/{company}/clientes', 'ClientController@list');
Route::get('empresas/{company}/crear-cliente', 'ClientController@create');
Route::post('empresas/{company}/store-cliente', 'ClientController@store');
Route::get('empresas/{company}/clientes/{client}/facturas', 'InvoiceController@list');
Route::get('empresas/{company}/clientes/{client}/crear-facturas', 'InvoiceController@create');
Route::post('empresas/{company}/clientes/{client}/store-facturas', 'InvoiceController@store');
Route::get('/clientes', 'ClientController@index');
Route::get('crear-cliente', 'ClientController@create');
Route::post('store-cliente', 'ClientController@store');
Route::get('/clientes/{client}/facturas', 'InvoiceController@index');
Route::get('/clientes/{client}/crear-facturas', 'InvoiceController@create');
Route::post('/clientes/{client}/store-facturas', 'InvoiceController@store');
Route::get('/facturas', 'InvoiceController@index');
Route::get('crear-facturas', 'InvoiceController@create');
Route::post('store-facturas', 'InvoiceController@store');
Route::get('/editar/{id}', 'InvoiceController@edit');
Route::post('update/{id}', 'InvoiceController@update');