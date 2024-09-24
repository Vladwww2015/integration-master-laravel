<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('app.admin_url') . '/integration-master',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', [\IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin\IntegrationMasterController::class, 'index'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.index',
        ])->name('admin.integration.master.list');

    Route::get('edit/{hash}', [\IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin\IntegrationMasterController::class, 'edit'])
        ->defaults('_config', [
            'view' => 'integration-master::admin.integration-master.edit',
        ])
        ->name('admin.integration.master.edit');

    Route::delete('delete', [\IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin\IntegrationMasterController::class, 'delete'])
        ->name('admin.integration.master.delete');

    Route::post('create', [\IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin\IntegrationMasterController::class, 'create'])
        ->name('admin.integration.master.create');

    Route::post('update', [\IntegrationHelper\IntegrationMasterLaravel\Controllers\Admin\IntegrationMasterController::class, 'update'])
        ->name('admin.integration.master.update');
});
