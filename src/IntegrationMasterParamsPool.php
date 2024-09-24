<?php

namespace IntegrationHelper\IntegrationMasterLaravel;

use IntegrationHelper\IntegrationMaster\Model\CollectionInterface;

class IntegrationMasterParamsPool
{
    private static $instance = null;

    protected array $externalIdentities = [];

    protected array $entityTypeSourceModelMap = [];

    private function __construct()
    {}

    public static function getInstance(): IntegrationMasterParamsPool
    {
        if(static::$instance === null) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    /**
     * @param string $identity
     * @param string $name
     * @return void
     */
    public function addExternalSourceIdentities(string $identity, string $name): void
    {
        $this->externalIdentities[$identity] = $name;
    }

    /**
     * @return array
     */
    public function getExternalSourceIdentities(): array
    {
        return $this->externalIdentities;
    }

    /**
     * @param string $entityType
     * @param CollectionInterface $collection
     * @return void
     */
    public function addEntityTypeSourceModelMap(string $entityType, CollectionInterface $collection): void
    {
        $this->entityTypeSourceModelMap[$entityType] = $collection::class;
    }

    /**
     * @return array
     */
    public function getEntityTypeSourceModelMap(): array
    {
        return $this->entityTypeSourceModelMap;
    }
}
