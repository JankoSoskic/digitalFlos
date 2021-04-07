<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd;
use App\Http\Controllers\BackEnd;
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

Route::get("/",[FrontEnd::class,"homeStrana"])->name("pocetna");
Route::get("/register",[FrontEnd::class,"registerStrana"])->name("register");
Route::get("/login",[FrontEnd::class,"loginStrana"])->name("login");
Route::get("/mojeObjave",[FrontEnd::class,"mojeObjaveStrana"])->name("mojeObjave");
Route::get("/jednaobjava/{idObjave}",[FrontEnd::class,"jednaobjava"])->name("jednaobjava");
Route::get("/prepravkaObjave/{idObjave}",[FrontEnd::class,"prepravkaObjave"])->name("prepravkaObjave");


Route::get("/logout",[BackEnd::class,"logout"])->name("logout");
Route::get("/loginovanje",[BackEnd::class,"loginovanje"])->name("loginovanje");
Route::post("/registrovanjeCoveka",[BackEnd::class,"registracijaNovog"])->name("registrovanje");
Route::post("/kreiranjeNovogBloga",[BackEnd::class,"kreiranjeNovogBloga"])->name("novBlog");
Route::delete("/brisanjeObjave",[BackEnd::class,"brisanjeObjave"])->name("brisanjeObjave");
Route::patch("/prepravkaObjave",[BackEnd::class,"prepravkaObjave"])->name("promenaObjave");
Route::get("/odobriobjavu",[BackEnd::class,"odobriobjavu"])->name("odobriobjavu");
Route::get("/izbrisiObjavu",[BackEnd::class,"izbrisiObjavu"])->name("izbrisiObjavu");

