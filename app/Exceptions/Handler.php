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

            /**
             * Store exception into logs table
             */

            $log = new Log();
            $log->error_code = rand(1,10) + ($log->latest()?->first()?->error_code ?? 1);
            $log->user_id = Auth::user()?->id ?? config('setting.admin_system_id');
            $log->action = $request->fullUrl();
            $log->error_content = $e;
            $log->save();

            $logId = $log->error_code;

            if (isset(Auth::user()?->id)) {
                return response()->view('errors.show', compact('logId'));
            }

            return redirect('login');
        });
    }
}
