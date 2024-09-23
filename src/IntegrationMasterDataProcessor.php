<?php
namespace IntegrationHelper\IntegrationMasterLaravel;

use IntegrationHelper\IntegrationMaster\Config\Config;
use IntegrationHelper\IntegrationMaster\Processors\IntegrationMasterDataProcess;
use IntegrationHelper\IntegrationMasterLaravel\Handlers\IntegrationMasterExclusionHandler;
use IntegrationHelper\IntegrationMasterLaravel\Handlers\IntegrationMasterHandler;
use IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster;
use IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion;

class IntegrationMasterDataProcessor
{
    private static $instance = null;

    private Config $config;

    private $process = null;

    private function __construct()
    {
        $integrationMaster = app(IntegrationMaster::class);
        $integrationMasterExclusion = app(IntegrationMasterExclusion::class);
        $integrationMasterHandler = app(IntegrationMasterHandler::class);
        $integrationMasterExclusionHandler = app(IntegrationMasterExclusionHandler::class);

        $this->config = new Config(
            $integrationMaster,
            $integrationMasterExclusion,
            $integrationMasterHandler,
            $integrationMasterExclusionHandler
        );
    }

    public static function getInstance(): IntegrationMasterDataProcessor
    {
        if(!static::$instance) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    public function getProcess(): IntegrationMasterDataProcess
    {
        if($this->process === null) {
            $this->process = new IntegrationMasterDataProcess($this->config);
        }

        return $this->process;
    }
}
