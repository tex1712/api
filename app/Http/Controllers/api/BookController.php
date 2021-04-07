<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Http\Resources\AuthorsResource;
use App\Models\Book;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Resources\BooksResource;
use App\Http\Resources\BooksCollection;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;

use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return BooksCollection
     */
    public function index(): BooksCollection
    {
        $authors = QueryBuilder::for(Book::class)->allowedSorts([
            'title',
            'description',
            'publication_year',
            'created_at',
            'updated_at'
        ])->jsonPaginate();
        return new BooksCollection($authors);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBookRequest  $request
     * @return JsonResponse
     */
    public function store(CreateBookRequest $request): JsonResponse
    {
        $book = Book::create([
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.description'),
            'publication_year' => $request->input('data.attributes.publication_year'),
        ]);

        return (new BooksResource($book))
            ->response()
            ->header('Location', route('books.show', ['book' => $book]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Book  $book
     * @return BooksResource
     */
    public function show(Book $book): BooksResource
    {
        return new BooksResource($book);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBookRequest  $request
     * @param  Book  $book
     * @return BooksResource
     */
    public function update(UpdateBookRequest $request, Book $book): BooksResource
    {
        $book->update($request->input('data.attributes'));
        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     * @throws Exception
     */
    public function destroy(Book $book): Response
    {
        $book->delete();
        return response(null, 204);
    }
}
