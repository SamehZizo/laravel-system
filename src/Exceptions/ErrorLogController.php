<?php

namespace Sameh\LaravelSystem\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ErrorLogController
{
    public static function storeErrorLog(Throwable $e, Request $request)
    {
        try {
            $errorLog = new ErrorLog;
            // throwable
            $errorLog->source_id = null;
            $errorLog->user_id = Auth::check() ? Auth::id() : null;
            $errorLog->code = $e->getCode() ?? null;
            $errorLog->file = $e->getFile() ?? null;
            $errorLog->line = $e->getLine() ?? null;
            $errorLog->message = $e->getMessage() ?? null;
            $errorLog->trace = $e->getTraceAsString() ?? null;
            // request
            $errorLog->body = json_encode($request->all()) ?? null;
            $errorLog->url = $request->url() ?? null;
            $errorLog->agent = $request->userAgent() ?? null;
            $errorLog->root = $request->root() ?? null;
            $errorLog->header = json_encode($request->header()) ?? null;
            $errorLog->is_json = $request->acceptsJson();
            $errorLog->is_ajax = $request->ajax();
            // save
            $errorLog->save();
        } catch (\Exception $e) {
            $errorLog = new ErrorLog;
            $errorLog->message = $e->getMessage();
            $errorLog->is_json = $request->acceptsJson();
            $errorLog->is_ajax = $request->ajax();
            $errorLog->save();
        }

    }
}
