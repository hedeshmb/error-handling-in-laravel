<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    /**
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|bool|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $logs = Log::orderBy('created_at', 'desc')->simplePaginate(15);
            return view('log.list', compact('logs'));
        } catch (\Throwable $exception) {
            report($exception);
            return false;
        }
    }

    /**
     * @param $logId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|bool|\Illuminate\Contracts\Foundation\Application
     */
    public function show($logId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|bool|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $log = Log::find($logId);
            return view('log.show', compact('log'));
        } catch (\Throwable $exception) {
            report($exception);
            return false;
        }
    }

    /**
     * Delete a log
     * @param $logId
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($logId): \Illuminate\Foundation\Application|bool|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            Log::find($logId)->delete();
            return redirect(route('logList'));
        } catch (\Throwable $exception) {
            report($exception);
            return false;
        }
    }
}
