<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use IntegrationHelper\IntegrationMaster\Model\Collection;
use IntegrationHelper\IntegrationMaster\Model\CollectionInterface;
use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterInterface;

/**
 *
 */
class IntegrationMaster extends Model implements IntegrationMasterInterface, \IntegrationHelper\IntegrationMasterLaravel\Contracts\IntegrationMaster
{
    public const TABLE = 'integration_master';

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @var string[]
     */
    protected $fillable = [
        'entity_type',
        'is_master',
        'source_model_collection',
        'external_source_identity'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->getAttribute('entity_type');
    }

    /**
     * @return string
     */
    public function getExternalSourceIdentity(): string
    {
        return (bool) $this->getAttribute('is_master');
    }

    /**
     * @return bool
     */
    public function isMaster(): bool
    {
        return $this->getAttribute('entity_type');
    }

    /**
     * @return CollectionInterface
     */
    public function getModelCollection(): CollectionInterface
    {
        $model = $this->getAttribute('source_model_collection');

        if(!$model || !in_array(CollectionInterface::class, class_implements($model))) {
            return new Collection();
        }

        return new $model();
    }
}
