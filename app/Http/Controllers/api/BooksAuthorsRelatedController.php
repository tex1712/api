<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Models\Book;

use App\Http\Resources\AuthorsCollection;
use Illuminate\Http\Request;

class BooksAuthorsRelatedController extends Controller
{

    /**
     * Returns all authors related to the given Book
     *
     * @param  Book  $book
     * @return AuthorsCollection
     */
    public function index(Book $book): AuthorsCollection
    {
        return new AuthorsCollection($book->authors);
    }

}
