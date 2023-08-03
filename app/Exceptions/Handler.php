<?php

namespace App\Exceptions;

use App\Http\Controllers\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {

            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());

        } else if ($exception instanceof NotFoundHttpException) {

            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        } else if ($exception instanceof ValidationException) {

            return $this->errorResponseWithErrors($exception->getMessage(), $exception->errors(), $exception->status);
        } else if (
            $exception instanceof NotFoundResourceException
            ||
            $exception instanceof ModelNotFoundException
        ) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_NOT_FOUND);
        } else if ($exception instanceof AuthenticationException) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        } else if (
            $exception instanceof AuthorizationException
            ||
            $exception instanceof \Illuminate\Validation\UnauthorizedException
        ) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        } else if (
            $exception instanceof BadRequestHttpException
        ) {

            return $this->errorResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

            return $this->errorResponse("Something went wrong");

    }
}
