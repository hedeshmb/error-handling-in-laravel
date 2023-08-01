<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;

class MakeExceptionController extends Controller
{

    public function notFoundClassException()
    {
        $user = User::first();
        return $user;
    }

    public function connectionException()
    {
        return Order::get();
    }

    public function methodNotAllowedHttpException()
    {
        try {
            $logs = Log::orderBy('created_at', 'desc')->simplePaginate(15);
            return view('log.list', compact('logs'));
        } catch (\Throwable $exception) {
            report($exception);
            return false;
        }
    }
}
