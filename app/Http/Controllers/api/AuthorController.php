<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Resources\AuthorsResource;
use App\Http\Resources\AuthorsCollection;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AuthorsCollection
     */
    public function index(): AuthorsCollection
    {
        $authors = QueryBuilder::for(Author::class)->allowedSorts([
            'name',
            'created_at',
            'updated_at'
        ])->jsonPaginate();
       return new AuthorsCollection($authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAuthorRequest  $request
     * @return JsonResponse
     */
    public function store(CreateAuthorRequest $request): JsonResponse
    {
        $author = Author::create([
            'name' => $request->input('data.attributes.name')
        ]);

        return (new AuthorsResource($author))
       ->response()
       ->header('Location', route('authors.show', ['author' => $author]));
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return AuthorsResource
     */
    public function show(Author $author): AuthorsResource
    {
        return new AuthorsResource($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAuthorRequest  $request
     * @param Author $author
     * @return AuthorsResource
     */
    public function update(UpdateAuthorRequest $request, Author $author): AuthorsResource
    {
        $author->update($request->input('data.attributes'));
        return new AuthorsResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     * @throws Exception
     */
    public function destroy(Author $author): Response
    {
        $author->delete();
        return response(null, 204);
    }
}
