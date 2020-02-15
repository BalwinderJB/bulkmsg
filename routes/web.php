<?php

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//----------------------------------User Table Excel--------------------------------------------------

Route::get('export', 'excelController@export')->name('export');
Route::get('importExportView', 'excelController@importExportView');
Route::post('import', 'excelController@import')->name('import');

//----------------------------------Mobile Table Excel--------------------------------------------------


Route::get('import/form', 'excelController@contactImportView');
Route::post('import', 'excelController@contactImport')->name('contact.import');

//----------------------------------End User/Mobile Table Excel--------------------------------------------------


//----------------------------------Payment--------------------------------------------------

Route::get('msg/form', 'MessageController@index');
Route::post('msg', 'MessageController@msg')->name('msg');
Route::get('bulkMsg', 'MessageController@bulkMsg');

//----------------------------------End Payment--------------------------------------------------

Route::get('test','MyController@test');

//-------------------------------------Email------------------------------------------------

//Route::get('/sendMail',
//    ['uses'=>'MailController@sendEmail',
//        'as' =>'sendMail',]);
//
//Route::get('/mail/queue', function(){
//   Mail::later(5,'emails.queued_email',["name" => "Balwinder"], function($message){
//        $message->to('balwinder.clubjb@gmail.com','Balwinder')->subject('welcome');
//   });
//
//    return 'email will be sent';
//});


Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

