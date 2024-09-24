<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('app.admin_url') . '/integration-master',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterController::class, 'index'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.index',
        ])->name('admin.integration.master.list');

    Route::get('edit/{hash}', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterController::class, 'edit'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.integration-master.edit',
        ])
        ->name('admin.integration.master.edit');

    Route::delete('delete', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterController::class, 'delete'])
        ->name('admin.integration.master.delete');

    Route::post('create', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterController::class, 'create'])
        ->name('admin.integration.master.create');

    Route::post('update', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterController::class, 'update'])
        ->name('admin.integration.master.update');
});


Route::group([
    'prefix' => config('app.admin_url') . '/integration-master-exclusion',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', [\IntegrationHelper\IntegrationMasterLaravelHttp\Http\Controllers\Admin\IntegrationMasterExclusionController::class, 'index'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.exclusion-index',
        ])->name('admin.integration.master.exclusion-list');

    Route::get('edit/{hash}', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterExclusionController::class, 'edit'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.integration-master.edit',
        ])
        ->name('admin.integration.master.edit-exclusion-list');

    Route::delete('delete', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterExclusionController::class, 'delete'])
        ->name('admin.integration.master.delete-exclusion-list');

    Route::post('create', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterExclusionController::class, 'create'])
        ->name('admin.integration.master.create-exclusion-list');

    Route::post('update', [\IntegrationHelper\IntegrationMasterLaravel\Http\Controllers\Admin\IntegrationMasterExclusionController::class, 'update'])
        ->name('admin.integration.master.update-exclusion-list');
});
