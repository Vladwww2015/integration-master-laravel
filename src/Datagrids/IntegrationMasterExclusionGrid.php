<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Datagrids;

use IntegrationHelper\IntegrationMasterLaravel\Datagrids\DataGrid;
use IntegrationHelper\IntegrationMasterLaravel\Datagrids\Enums\ColumnTypeEnum;
use Illuminate\Support\Facades\DB;

class IntegrationMasterExclusionGrid extends DataGrid
{
    protected $index = 'id';

    protected $sortOrder = 'desc';

    public function prepareQueryBuilder()
    {
        return DB::table(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMasterExclusion::TABLE, 'ime')
            ->select([
                'ime.id as id',
                'ime.master_id as master_id',
                'ime.entity_identity as entity_identity',
                'im.entity_type as entity_type',
                'im.external_identity as external_identity',
            ])->join(\IntegrationHelper\IntegrationMasterLaravel\Models\IntegrationMaster::TABLE . ' as im', function ($join) {
                $join->on('ime.master_id', '=', 'im.id');
            });
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'entity_type',
            'label'      => __('Entity Type'),
            'type'       => ColumnTypeEnum::STRING->value,
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'entity_identity',
            'label'      => __('Entity Identity'),
            'type'       => ColumnTypeEnum::STRING->value,
            'searchable' => false,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'external_identity',
            'label'      => __('External Identity'),
            'type'       => ColumnTypeEnum::STRING->value,
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('integration-master.exclusion-list.delete-exclusion-item')) {
            $this->addAction([
                'index' => 'delete',
                'title'  => __('Edit'),
                'icon'   => 'icon-delete',
                'method' => 'DELETE',
                'route'  => 'admin.integration.master.delete-exclusion-item',
                'url'    => function ($row) {
                    return route('admin.integration.master.delete-exclusion-item', ['id' => $row->id]);
                },
            ]);
        }
    }

    public function prepareMassActions()
    {
        if (bouncer()->hasPermission('bv.integration-processes.massaction')) {
            $this->addMassAction([
                'title'  => __('Mass Reset'),
                'method' => 'POST',
                'url'    => route('admin.importexport.bv.integration-processes.massreset'),
            ]);
        }
    }
}
