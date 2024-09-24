<?php

namespace IntegrationHelper\IntegrationMasterLaravel\Datagrids;

use IntegrationHelper\IntegrationMasterLaravel\Datagrids\DataGrid;
use IntegrationHelper\IntegrationMasterLaravel\Datagrids\Enums\ColumnTypeEnum;
use Illuminate\Support\Facades\DB;
use IntegrationHelper\IntegrationMasterLaravel\IntegrationMasterSerializator;

class IntegrationMasterGrid extends DataGrid
{
    protected $index = 'id';

    protected $sortOrder = 'desc';

    public function prepareQueryBuilder()
    {
        return DB::table('integration_master')
            ->select([
                'id',
                'entity_type',
                'is_master',
                'source_model_collection',
                'external_source_identity',
                'created_at'
            ]);
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
            'index'      => 'is_master',
            'label'      => __('Is Master?'),
            'type'       => ColumnTypeEnum::BOOLEAN->value,
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
        ]);

        $this->addColumn([
            'index'      => 'external_source_identity',
            'label'      => __('External Source Identity'),
            'type'       => ColumnTypeEnum::STRING->value,
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'source_model_collection',
            'label'      => __('Source Model'),
            'type'       => ColumnTypeEnum::STRING->value,
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => __('Created At'),
            'type'       => ColumnTypeEnum::DATE_TIME_RANGE->value,
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    public function prepareActions()
    {
        if (bouncer()->hasPermission('integration-master.edit')) {
            $this->addAction([
                'index' => 'edit',
                'title'  => __('Edit'),
                'method' => 'GET',
                'route'  => 'admin.integration.master.edit',
                'url'    => function ($row) {
                    return route('admin.integration.master.edit', ['hash' => IntegrationMasterSerializator::encode(['id' => $row->id])]);
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
