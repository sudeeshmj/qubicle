<?php

namespace App\Exceptions;

use App\Helpers\ApiResponseHelper;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {

            if ($request->expectsJson()) {
                return ApiResponseHelper::error('Resource not found.', 404);
            } else {
                return redirect()->route('posts.index')->with('error', 'Post not found.');
            }
            return parent::render($request, $exception);
        });

        $this->renderable(function (AuthorizationException $e, $request) {
            if ($request->expectsJson()) {
                return ApiResponseHelper::error('Unauthorized.', 403);
            }
        });
    }
}
