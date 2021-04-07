<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthorController;
use App\Http\Controllers\api\AuthorsBooksRelationshipsController;
use App\Http\Controllers\api\BookController;
use App\Http\Controllers\api\BooksAuthorsRelationshipsController;
use App\Http\Controllers\api\BooksAuthorsRelatedController;

use App\Http\Controllers\api\LoginController;

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

Route::middleware('auth:api')->prefix('v1')->group( function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Authors
    Route::apiResource('/authors', AuthorController::class);

    Route::get('authors/{author}/relationships/books', [AuthorsBooksRelationshipsController::class, 'index'])
        ->name('authors.relationships.books');


    // Books
    Route::apiResource('/books', BookController::class);

    Route::get('books/{book}/relationships/authors', [BooksAuthorsRelationshipsController::class, 'index'])
        ->name('books.relationships.authors');

    Route::patch('books/{book}/relationships/authors', [BooksAuthorsRelationshipsController::class, 'update'])
        ->name('books.relationships.authors');

    Route::get('books/{book}/authors', [BooksAuthorsRelatedController::class, 'index'])
        ->name('books.authors');

});





Route::post('user/login', [LoginController::class, 'login']);


Route::get('/test', function(Request $request){
    return 'authenticated';
  })->middleware('client');


