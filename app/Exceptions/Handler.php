<?php

namespace App\Exceptions;

use App\Models\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $e, Request $request) {

            if (isset(Auth::user()?->id)) {
                $log = new Log();
                $log->user_id = Auth::user()->id;
                $log->action = $request->fullUrl();
                $log->error_content = $e;
                $log->save();

                $logId = $log->id;

                return response()->view('errors.show', compact('logId'));
            }
            return redirect('login');
        });
    }
}
