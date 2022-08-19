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
            $exceptionLog = new ExceptionLog;
            // throwable
            $exceptionLog->source_id = null;
            $exceptionLog->user_id = Auth::user()->id ?? null;
            $exceptionLog->code = $e->getCode() ?? null;
            $exceptionLog->file = $e->getFile() ?? null;
            $exceptionLog->line = $e->getLine() ?? null;
            $exceptionLog->message = $e->getMessage() ?? null;
            $exceptionLog->trace = $e->getTraceAsString() ?? null;
            // request
            $exceptionLog->body = json_encode($request->all()) ?? null;
            $exceptionLog->url = $request->url() ?? null;
            $exceptionLog->agent = $request->userAgent() ?? null;
            $exceptionLog->root = $request->root() ?? null;
            $exceptionLog->header = $request->header() ?? null;
            $exceptionLog->is_json = $request->acceptsJson();
            $exceptionLog->is_ajax = $request->ajax();
            // save
            $exceptionLog->save();
        } catch (\Exception $e) {
            $exceptionLog = new ExceptionLog;
            $exceptionLog->message = $e->getMessage();
            $exceptionLog->save();
        }

    }
}
