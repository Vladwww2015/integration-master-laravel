<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Handlers;

use IntegrationHelper\IntegrationMaster\Model\IntegrationMasterExclusionInterface;
use IntegrationHelper\IntegrationMaster\Handlers\IntegrationMasterExclusionHandlerInterface;
use IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion;
use IntegrationHelper\IntegrationMasterLaravel\Repositories\IntegrationMasterExclusionRepository;

class IntegrationMasterExclusionHandler implements IntegrationMasterExclusionHandlerInterface
{
    public function __construct(protected IntegrationMasterExclusionRepository $exclusionRepository)
    {
    }

    public function save(int $masterId, array $entityIdentities): void
    {
        $data = [];
        foreach ($entityIdentities as $identity) {
            $data[] = [
                'master_id' => $masterId,
                'entity_identity' => $identity,
            ];
        }

        $this->exclusionRepository->getModel()->upsert($data, ['master_id', 'entity_identity']);
    }

    public function delete(int $masterId, array $entityIdentities): void
    {
        if($entityIdentities) {
            /**
             * @var $model IntegrationMasterExclusion
             */
            $model = $this->exclusionRepository->getModel();
            $model->query()->where('master_id', '=', $masterId)
                ->whereIn('entity_identity', 'IN', $entityIdentities)
                ->delete();
        }
    }

    /**
     * @param int $masterId
     * @param array $entityIdentities
     * @return IntegrationMasterExclusionInterface[]
     */
    public function find(int $masterId, array $entityIdentities = []): array
    {
        return $this->exclusionRepository->findWhere([
            ['entity_identity', 'IN', $entityIdentities],
            ['master_id', $masterId]
        ]);
    }

    public function read(int $id): IntegrationMasterExclusionInterface
    {
        return $this->exclusionRepository->find($id);
    }
}
