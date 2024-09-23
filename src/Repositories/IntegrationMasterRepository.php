<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Repositories;

class IntegrationMasterRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'IntegrationHelper\IntegrationMasterLaravel\Contracts\IntegrationMaster';
    }
}
