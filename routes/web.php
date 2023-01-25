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

//PUBLIC
Route::get("",['uses'=>'functions@fly_home','as'=>'goto_home']);
Route::get("/team",['uses'=>'functions@fly_team','as'=>'goto_team']);
Route::get("/partner",['uses'=>'functions@fly_partner','as'=>'goto_partner']);
Route::get("/aboutus",['uses'=>'functions@fly_aboutus','as'=>'goto_aboutus']);
Route::get("/faq",['uses'=>'functions@fly_faq','as'=>'goto_faq']);
Route::get("/contactus",['uses'=>'functions@fly_contactus','as'=>'goto_contactus']);
Route::get("/termsandconditions",['uses'=>'functions@goto_terms','as'=>'goto_terms']);
Route::get("/privacypolicy",['uses'=>'functions@goto_privacypolicy','as'=>'goto_privacypolicy']);
Route::get("/storymode",['uses'=>'functions@fly_story','as'=>'goto_story']);
Route::get("/lorechapter1",['uses'=>'functions@fly_lore_c1','as'=>'goto_lore_c1']);
