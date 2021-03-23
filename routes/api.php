<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/RestFull/Catalog/', 'ApiController@DataCatalog');

Route::get('/v1/RestFull/rolles/{id}', 'ApiController@RollesLayers');

Route::get('/v1/RestFull/datajson/{shema}/{exp}', 'ApiController@DataJson');
Route::get('/v1/RestFull/DataJsonApi/{shema}/{exp}', 'ApiController@DataJsonApi');

Route::get('/v1/RestFull/Catalog/aliase/{shema}/{exp}', 'ApiController@Catalog');

Route::get('/v1/RestFull/LayerNameEdit/{id}', 'ApiController@LayerNameEdit');

Route::get('/v1/RestFull/getUsers/', 'adminController@users');

Route::get('/v1/RestFull/catalogAdmin/', 'adminController@DataCatalog');

Route::get('/v1/RestFull/catalogAdminCartes/', 'adminController@DataCatalogCartes');

Route::get('/v1/RestFull/column_name/{shema}/{table}', 'ApiController@column_name');
