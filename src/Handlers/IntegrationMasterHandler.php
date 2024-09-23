<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Handlers;

use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterInterface;
use IntegrationHelper\IntegrationMaster\Handlers\IntegrationMasterHandlerInterface;
use IntegrationHelper\IntegrationMasterLaravel\Repositories\IntegrationMasterRepository;

class IntegrationMasterHandler implements IntegrationMasterHandlerInterface
{
    public function __construct(protected IntegrationMasterRepository $repository)
    {
    }

    public function save(IntegrationMasterInterface $integrationMaster): void
    {
        $this->repository->updateOrCreate([
            'is_master' => $integrationMaster->isMaster(),
            'entity_type' => $integrationMaster->getEntityType(),
            'external_source_identity' => $integrationMaster->getExternalSourceIdentity(),
            'source_model_collection' => $integrationMaster->getModelCollection()::class
        ]);
    }

    public function delete(IntegrationMasterInterface $integrationMaster): void
    {
        $this->repository->delete($integrationMaster->getId());
    }

    public function find(string $entityType, string $externalIdentity): IntegrationMasterInterface
    {
        return $this->repository->findWhere([
            ['entity_type', $entityType],
            ['external_source_identity', $externalIdentity]
        ]);
    }

    public function read(int $id): IntegrationMasterInterface
    {
        return $this->repository->find($id);
    }
}
