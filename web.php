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

Route::get('/', function () {
    return view('welcome');

});
Route::get("/hello", function () {
	print("<h1>Hello World!</h1>");
	return null;
});
Route::get("/whoAreYou/{name}", function($name) {
	return "<h1>こんにちは".$name."さん</h1>";
});

Route::redirect("/google", "https://www.google.com/", 301);

Route::get("/helloBlade", function() {
	return view("hello");
});

Route::get("/helloBladeWithData", function() {
	$data["name"] = "武者";
	$data["num"] = 18;
	return view("helloWithData", $data);
});

Route::get("/chap3/helloToSomeone", function() {
	$data["name"] = "中野";
	return view("chap3.hello", $data);
});

Route::get("/chap3/if", function() {
	$data["rand"] = rand(1, 3);
	$data["resultList"] = ["A"=>"田中", "B"=>"中野", "C"=>"野村", "D"=>"北上"];
	return view("chap3.ifStatement", $data);
});

Route::get("/chap4/helloBladeWithData", \App\Http\Controllers\HelloBladeWithDataController::class);

Route::get("/chap4/helloMusha", [\App\Http\Controllers\Chap4Controller::class,"helloMusha"]);  // （1）
Route::get("/chap4/helloNakano", [\App\Http\Controllers\Chap4Controller::class,"helloNakano"]);  // （2）
Route::get("/chap4/whoAreYou/{name}", [\App\Http\Controllers\Chap4Controller::class,"whoAreYou"]);

Route::get("/chap5/middlewareTest", function() {
	return "<p>ミドルウェアのテスト。こちらはリクエスト処理。</p>";  // (1)
})->middleware("recordipaddress:中");  // (2)

Route::get("/chap6/newBook", [\App\Http\Controllers\Chap6Controller::class,"newBook"]);
Route::get("/chap6/newBook2", [\App\Http\Controllers\Chap6Controller::class,"newBook2"]);
Route::get("/chap6/newBook3", [\App\Http\Controllers\Chap6Controller::class,"newBook3"]);

Route::get("/chap8/showInput", [\App\Http\Controllers\Chap8Controller::class,"showInput"]);
Route::post("/chap8/addData", [\App\Http\Controllers\Chap8Controller::class,"addData"]);
Auth::routes();

Route::get("/chap9/showOneDeptByRaw", [\App\Http\Controllers\Chap9Controller::class,"showOneDeptByRaw"]);
Route::get("/chap9/showAllDeptsByBuilder", [\App\Http\Controllers\Chap9Controller::class,"showAllDeptsByBuilder"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
