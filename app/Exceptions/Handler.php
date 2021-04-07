<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Collection;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Str;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json([
            'errors' => [
                [
                    'title' => Str::title(Str::snake(class_basename($exception), ' ')),
                    'details' => $exception->getMessage(),
                ]
            ]
        ], $this->isHttpException($exception) ? $exception->getCode() : 500);
    }



    protected function invalidJson($request, ValidationException $exception): \Illuminate\Http\JsonResponse
    {
        $errors = ( new Collection ($exception->validator->errors()) )
            ->map(function ($error, $key) {
                return [
                    'title'   => 'Validation Error',
                    'details' => $error[0],
                    'source'  => [
                        'pointer' => '/' . str_replace('.', '/', $key),
                    ]
                ];
            })
            ->values();

        return response()->json([
            'errors' => $errors,
        ], $exception->status);

    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

}
