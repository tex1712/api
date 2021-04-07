<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Author;

use App\Http\Resources\BooksIdentifierResource;
use \Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorsBooksRelationshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Author $author
     * @return AnonymousResourceCollection
     */
    public function index(Author $author): AnonymousResourceCollection
    {
        return BooksIdentifierResource::collection($author->books);
    }

}
