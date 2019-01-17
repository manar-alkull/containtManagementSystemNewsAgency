<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//------------------custom field------------------------------
Route::get('fieldItem/{item}', "coustom_filds\\ItemFieldController@index");
Route::post('fieldItem/add/{item}', "coustom_filds\\ItemFieldController@insert");
Route::get('fieldItem/showUpdate/{fieldvalue}', "coustom_filds\\ItemFieldController@showUpdate");
Route::post('fieldItem/update/{fieldvalue}', "coustom_filds\\ItemFieldController@update");
Route::get('fieldItem/delete/{fieldvalue}', "coustom_filds\\ItemFieldController@delete");
Route::get('frameField/addItem/{item}', "coustom_filds\\ItemFieldController@frameAddItem");

Route::get('fieldCat/{categoryId}', "coustom_filds\\CategoryFieldController@index");
Route::post('fieldCat/add/{category}', "coustom_filds\\CategoryFieldController@insert");
Route::get('fieldCat/showUpdate/{custom_field}', "coustom_filds\\CategoryFieldController@showUpdate");
Route::post('fieldCat/update/{custom_field}', "coustom_filds\\CategoryFieldController@update");
Route::get('fieldCat/delete/{custom_field}', "coustom_filds\\CategoryFieldController@delete");
Route::get('fieldCat/show/{custom_field}', "coustom_filds\\CategoryFieldController@show");
//-------------------------------------------------------------

Route::get('template', "TemplateController@index");
Route::get('showCategory/{categorie}', "TemplateController@showCategory");
Route::get('showItemPerPage/{categorie}', "TemplateController@showItemPerPage");
Route::get('showFormPerPage/{categorie}', "TemplateController@showFormPerPage");
Route::get('showCategoryList/{parent}', "TemplateController@showCategoryList");
Route::get('menu', "MenuController@index");
Route::get('category', "CategoryController@index");
Route::get('permission', "PermissionController@index");
Route::get('users', "UserController@index");
Route::post('addMenu', "MenuController@add");
Route::get('updateMenu/{menu}', "MenuController@update");
Route::post('saveMenu/{menu}', "MenuController@save");
Route::get('deleteMenu/{menu}', "MenuController@delete");
Route::post('addCategory', "CategoryController@add");
Route::get('updateCategory/{category}', "CategoryController@update");
Route::post('saveCategory/{category}', "CategoryController@save");
Route::get('deleteCategory/{category}', "CategoryController@delete");

Route::get('item/{category}', "ItemController@index");
Route::post('addItem/{category}', "ItemController@add");
Route::post('updateItem/{item}', "ItemController@update");
Route::get('showItem/{category}/{item}', "ItemController@show");
Route::get('deleteItem/{item}', "ItemController@delete");

Route::get('language', "LanguageController@index");
Route::post('addLanguage', "LanguageController@add");
Route::get('updateLanguage/{language}', "LanguageController@update");
Route::post('saveLanguage/{language}', "LanguageController@save");
Route::get('deleteLanguage/{language}', "LanguageController@delete");

Route::get('changeLanguageSession/{language}', "LanguageController@changeLanguageSession");

Route::get('dictionary', "DictionaryController@index");
Route::get('updateDictionary/{dictionary}', "DictionaryController@update");
Route::post('saveDictionary/{dictionary}', "DictionaryController@save");
Route::post('changeUserRole/{user}', "UserController@changeRole");



Route::post('addPermission', "PermissionController@add");
Route::get('deletePermission/{role}/{permission}', "PermissionController@delete");
