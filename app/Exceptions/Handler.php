<?php

namespace App\Exceptions;

use App\Models\Configuration;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    }

    // function render($request, Throwable $exception)
    // {
    //     $configuration  = Configuration::first();
    //     $data = [
    //         'konfig'    => $configuration,
    //     ];
    //     if ($this->isHttpException($exception)) {
    //         if ($exception->getCode() == 404) {
    //             return response()->view('errors.' . '404', [], $data);
    //         }
    //         if ($exception->getCode() == 500) {
    //             return response()->view('errors.' . '500', [], $data);
    //         }
    //     }
    //     return parent::render($request, $exception);
    // }

    function render($request, Throwable $exception)
{
        if ($this->isHttpException($exception)) {
            if ($exception->getCode() == 404) {
                return response()->view('errors.404', [], 404);
            }
            if ($exception->getCode() == 500) {
                return response()->view('errors.500', [], 500);
            }
        }
        return parent::render($request, $exception);
     }
}
