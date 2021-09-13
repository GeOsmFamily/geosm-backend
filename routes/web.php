<?php

use Illuminate\Support\Facades\Route;

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

Route::post('loginAdmin', ['as' => 'loginAdmin', 'uses' => 'LoginController@loginAdmin']);

// Route::get('/','GeoportailController@index');
Route::get('/getParamsForSeo', 'GeoportailController@getParamsForSeo');

Route::get('/check', 'GeoportailController@checkaccount');

Route::get('deconnect', 'LoginController@deconnect');


Route::get('/', function () {
    return view('admin');
});

Route::get('config_bd_projet', 'AdminController@config_bd_projet');

/*-------------------geoportail---------------------*/
/*-------------------------------------------------------------------*/
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@checklogin']);

Route::post('updateAttribute', ['as' => 'updateAttribute', 'uses' => 'GeoportailController@updateAttribute']);

// Route::post('addEntite', ['as' => 'addEntite', 'uses' => 'GeoportailController@addEntite']);

Route::post('deleteEntite', ['as' => 'deleteEntite', 'uses' => 'GeoportailController@deleteEntite']);

Route::post('updateEntite', ['as' => 'updateEntite', 'uses' => 'GeoportailController@updateEntite']);

Route::post('share', ['as' => 'share', 'uses' => 'GeoportailController@share']);




Route::post('getLimite', 'GeoportailController@getLimite');
Route::post('getListLimit', 'GeoportailController@getListLimit');
Route::post('getLimitById', 'GeoportailController@getLimitById');

Route::post('searchCouche', 'GeoportailController@searchCouche');
Route::post('searchLimite', 'GeoportailController@searchLimite');
Route::post('searchLimiteInTable', 'GeoportailController@searchLimiteInTable');
Route::post('getLimiteById', 'GeoportailController@getLimiteById');
Route::get('getZoneInteret', 'GeoportailController@getZoneInteret');


Route::post('add_limite_administrative', 'AdminController@add_limite_administrative');
Route::post('delete_limite_administrative', 'AdminController@delete_limite_administrative');
Route::get('config_bd_projet', 'AdminController@config_bd_projet');


Route::post('whriteSvg', 'AdminController@whriteSvg');
Route::post('whriteMultipleSvg', 'AdminController@whriteMultipleSvg');

Route::post('addEntite', 'GeoportailController@addEntite');

Route::get('getEntite', 'GeoportailController@getEntite');



//API RESTFUL

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('v1/RestFull/Catalog/', 'App\Http\Controllers\ApiController@DataCatalog');

    $api->get('v1/RestFull/rolles/{id}', 'App\Http\Controllers\ApiController@RollesLayers');

    $api->get('v1/RestFull/datajson/{shema}/{exp}', 'App\Http\Controllers\ApiController@DataJson');
    $api->get('v1/RestFull/DataJsonApi/{shema}/{exp}', 'App\Http\Controllers\ApiController@DataJsonApi');

    $api->get('v1/RestFull/Catalog/aliase/{shema}/{exp}', 'App\Http\Controllers\ApiController@Catalog');

    $api->get('v1/RestFull/LayerNameEdit/{id}', 'App\Http\Controllers\ApiController@LayerNameEdit');

    $api->get('v1/RestFull/getUsers/', 'App\Http\Controllers\AdminController@users');

    $api->get('v1/RestFull/catalogAdmin/', 'App\Http\Controllers\AdminController@DataCatalog');

    $api->get('v1/RestFull/catalogAdminCartes/', 'App\Http\Controllers\AdminController@DataCatalogCartes');

    $api->get('v1/RestFull/column_name/{shema}/{table}', 'App\Http\Controllers\ApiController@column_name');
});

Route::group(['prefix' => '/user'], function () {

    Route::post('add/', 'UserController@add');

    Route::post('updateUser/', 'UserController@updateUser');

    Route::post('deleteUser/', 'UserController@deleteUser');

    Route::post('addRolesUser/', 'UserController@addRolesUser');

    Route::post('deleteRole/', 'UserController@deleteRole');

    Route::post('uploads/', 'UserController@uploads');
});


Route::group(['prefix' => '/thematique'], function () {

    Route::get('getCatalogueDonne/', 'ThematiqueController@getCatalogueDonne');




    Route::post('changeLayerSousThematique/', 'ThematiqueController@changeLayerSousThematique');

    Route::post('updateThematique/', 'ThematiqueController@updateThematique');
    Route::post('updateOrdreThematique/', 'ThematiqueController@updateOrdreThematique');


    Route::post('addThematique/', 'ThematiqueController@addThematique');

    Route::post('deleteThematique/', 'ThematiqueController@deleteThematique');



    Route::post('addSousThematique/', 'ThematiqueController@addSousThematique');

    Route::post('updateSousThematique/', 'ThematiqueController@updateSousThematique');

    Route::post('deleteSousThematique/', 'ThematiqueController@deleteSousThematique');



    Route::post('addCouche/', 'ThematiqueController@addCouche');

    Route::post('deleteCouche/', 'ThematiqueController@deleteCouche');

    Route::post('change_nameCouche/', 'ThematiqueController@change_nameCouche');

    Route::post('save_logo/', 'ThematiqueController@save_logo');




    Route::post('addColumns/', 'ThematiqueController@addColumns');

    Route::post('deleteColumn/', 'ThematiqueController@deleteColumn');

    Route::post('updateColumn/', 'ThematiqueController@updateColumn');

    Route::post('definir_champ_principal/', 'ThematiqueController@definir_champ_principal');


    Route::post('queryLimite/', 'ThematiqueController@queryLimite');


    Route::post('emptyTable/', 'ThematiqueController@emptyTable');
    Route::post('importationDeDonnes/', 'ThematiqueController@importationDeDonnes');

    Route::post('save_properties_couche_wms/', 'ThematiqueController@save_properties_couche_wms');
    Route::post('define_service/', 'ThematiqueController@define_service');

    Route::post('save_properties_couche_api/', 'ThematiqueController@save_properties_couche_api');

    Route::post('save_properties_couche_osm/', 'ThematiqueController@save_properties_couche_osm');
    Route::post('save_properties_couche_sql_complete_osm/', 'ThematiqueController@save_properties_couche_sql_complete_osm');
    Route::post('save_select_clause/', 'ThematiqueController@save_select_clause');


    Route::post('delete_cles_vals_osm/', 'ThematiqueController@delete_cles_vals_osm');

    Route::post('querryOsm/', 'ThematiqueController@querryOsm');

    Route::post('chooseTypeWms/', 'ThematiqueController@chooseTypeWms');

    Route::post('genrateJsonFileByCat/', 'ThematiqueController@genrateJsonFileByCat');

    Route::get('genrateAutomaticJsonFileByCat/', 'ThematiqueController@genrateAutomaticJsonFileByCat');

    Route::post('addMetadata/', 'ThematiqueController@addMetadata');

    Route::post('editMetadata/', 'ThematiqueController@editMetadata');

    Route::post('donwload/', 'ExportController@exportDataOsm');
});

Route::group(['prefix' => '/adressage'], function () {

    Route::post('getAdresse/', 'AdressageController@getAdresse');

    Route::post('getPosition/', 'AdressageController@getPosition');

    Route::post('getPoints/', 'AdressageController@getPoints');


    Route::get('codeUsage/', 'AdressageController@codeUsage');

    Route::post('getData/', 'AdressageController@getData');

    Route::post('getElastcData/', 'AdressageController@getElastcData');


    Route::post('getAdresse_on_click/', 'AdressageController@getAdresse_on_click');
});


Route::post("uploadGeoFIle/file", "FilesController@uploadGeoFIle");

Route::post("upload/file", "FilesController@upload");

Route::post("uploads/file", "FilesController@uploads");

Route::get('/geoportail/getCatalogue', 'AdminController@DataCatalog');
// Route::get('/geoportail/getCatalogue', 'GeoportailController@getCatalogue');

Route::post('/geoportail/saveDraw', 'GeoportailController@saveDraw');
Route::post('/geoportail/getDraw', 'GeoportailController@getDraw');
Route::post('/geoportail/drapeline', 'GeoportailController@drapeline');
Route::post('/geoportail/getAlti', 'GeoportailController@getAlti');
Route::post('/geoportail/getUsers', 'GeoportailController@getUsers');

Route::post('/geoportail/getJsonFIle', 'GeoportailController@getJsonFIle');

Route::post('/geoportail/addCountVieuwData', 'GeoportailController@addCountVieuwData');
Route::post('/analytics', 'GeoportailController@analytics');
Route::post('/getcountry', 'GeoportailController@getCountry');
Route::get('/geoportail/getVisitiors', 'GeoportailController@getVisitiors');
Route::post('/geoportail/getFeatureFromLayerById', 'GeoportailController@getFeatureFromLayerById');

Route::get('/geoportail/getAllExtents', 'AdminController@getAllExtents');

Route::group(['prefix' => '/cartes'], function () {


    Route::post('addGroupeCartes/', 'CartesController@addGroupeCartes');

    Route::post('updateGroupeCartes/', 'CartesController@updateGroupeCartes');

    Route::post('deleteCartes/', 'CartesController@deleteCartes');


    Route::post('updateSousCartes/', 'CartesController@updateSousCartes');

    Route::post('deleteSousCartes/', 'CartesController@deleteSousCartes');

    Route::post('addCoucheCartes/', 'CartesController@addCoucheCartes');

    Route::post('addSousGroupeCartes/', 'CartesController@addSousGroupeCartes');

    Route::post('change_nameCoucheCartes/', 'CartesController@change_nameCoucheCartes');

    Route::post('saveCommentCartes/', 'CartesController@saveCommentCartes');

    Route::post('deleteCoucheCartes/', 'CartesController@deleteCoucheCartes');

    Route::post('editCoucheCartes/', 'CartesController@editCoucheCartes');

    Route::post('addSequence/', 'CartesController@addSequence');

    Route::post('deleteSequence/', 'CartesController@deleteSequence');

    Route::post('setPrincipalCartes/', 'CartesController@setPrincipalCartes');

    Route::post('add_doc_pdf/', 'CartesController@add_doc_pdf');

    Route::post('updatePdfcarte/', 'CartesController@updatePdfcarte');


    Route::post('delete_doc_pdf/', 'CartesController@delete_doc_pdf');

    Route::post('SaveCoordPdf/', 'CartesController@SaveCoordPdf');

    Route::post('addMetadata/', 'CartesController@addMetadata');
    Route::post('editMetadata/', 'CartesController@editMetadata');
});
