<?php

use Sameh\LaravelSystem\Controllers\System\FormBuilder\SystemFieldController;
use Sameh\LaravelSystem\Controllers\System\FormBuilder\SystemFormController;
use Sameh\LaravelSystem\Controllers\System\FormBuilder\SystemFormFieldsController;
use Illuminate\Support\Facades\Route;

Route::resource('system_fields', SystemFieldController::class)->parameters(['system_fields' => 'id']);
Route::resource('system_forms', SystemFormController::class)->parameters(['system_forms' => 'id']);
Route::resource('system_form_fields', SystemFormFieldsController::class)->parameters(['system_form_fields' => 'id']);

Route::get('get_system_models', [SystemFormFieldsController::class, 'get_system_models']);
