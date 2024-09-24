<?php

namespace IntegrationHelper\IntegrationMasterLaravel;

class IntegrationMasterParamsPool
{
    private static $instance = null;

    protected array $externalIdentities = [];

    private function __construct()
    {}

    public static function getInstance(): IntegrationMasterParamsPool
    {
        if(static::$instance === null) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    public function addExternalSourceIdentities(string $identity): void
    {
        $this->externalIdentities[] = $identity;
    }

    public function getExternalSourceIdentities(): array
    {
        return $this->externalIdentities;
    }
}
