<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Repositories;

class IntegrationMasterExclusionRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'IntegrationHelper\IntegrationMasterLaravel\Contracts\IntegrationMasterExclusion';
    }
}
