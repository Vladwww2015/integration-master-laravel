<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::class,
        \IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion::class
    ];

    public function boot(): void
    {
        if ($this->areModelsEnabled()) {
            $this->registerModels();
        }
    }
}
