<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BooksAuthorsRelationshipsRequest;
use Illuminate\Http\Request;

use App\Models\Book;

use App\Http\Resources\AuthorsIdentifierResource;
use \Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BooksAuthorsRelationshipsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Book  $book
     * @return AnonymousResourceCollection
     */
    public function index(Book $book): AnonymousResourceCollection
    {
        return AuthorsIdentifierResource::collection($book->authors);
    }

    /**
     * Update books/authors relationships
     *
     * @param Request $request
     * @param Book  $book
     * @return Response
     */
    public function update(BooksAuthorsRelationshipsRequest $request, Book $book): Response
    {
        $ids = $request->input('data.*.id');
        $book->authors()->sync($ids);
        return response(null, 204);
    }

}
