<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterExclusionInterface;
use IntegrationHelper\IntegrationMasterLaravel\Contracts\IntegrationMasterExclusion as Contract;

/**
 *
 */
class IntegrationMasterExclusion extends Model implements IntegrationMasterExclusionInterface, Contract

{
    public const TABLE = 'integration_master_exclusion';

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @var string[]
     */
    protected $fillable = [
        'master_id',
        'entity_identity'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * @return int
     */
    public function getMasterId(): int
    {
        return $this->getAttribute('master_id');
    }

    /**
     * @return string|int
     */
    public function getEntityIdentity(): string|int
    {
        return $this->getAttribute('entity_identity');
    }
}
