<?php

return [
    [
        'key'   => 'integration-master',
        'name'  => 'Integration Master',
        'route' => 'admin.integration.master.list',
        'sort'  => 2000,
    ],[
        'key'   => 'integration-master.list',
        'name'  => 'Integration Master List',
        'route' => 'admin.integration.master.list',
        'sort'  => 10,
    ],
    [
        'key'   => 'integration-master.create',
        'name'  => 'Integration Master Create',
        'route' => 'admin.integration.master.create',
        'sort'  => 15,
    ],
    [
        'key'   => 'integration-master.edit',
        'name'  => 'Integration Master Edit',
        'route' => 'admin.integration.master.edit',
        'sort'  => 15,
    ],
    [
        'key'   => 'integration-master.update',
        'name'  => 'Integration Master Update',
        'route' => 'admin.integration.master.update',
        'sort'  => 16,
    ],
    [
        'key'   => 'integration-master.delete',
        'name'  => 'Integration Master Delete',
        'route' => 'admin.integration.master.delete',
        'sort'  => 15,
    ],
    [
        'key'   => 'integration-master.exclusion-list',
        'name'  => 'Integration Master Exclusion List',
        'route' => 'admin.integration.master.exclusion-list',
        'sort'  => 20,
    ],
    [
        'key'   => 'integration-master.exclusion-list.create-exclusion-list',
        'name'  => 'Integration Master Only Create Exclusion List',
        'route' => 'admin.integration.master.create-exclusion-list',
        'sort'  => 10,
    ],[
        'key'   => 'integration-master.exclusion-list.delete-exclusion-list',
        'name'  => 'Integration Master Delete Exclusion List',
        'route' => 'admin.integration.master.delete-exclusion-list',
        'sort'  => 20,
    ],[
        'key'   => 'integration-master.exclusion-list.replace-exclusion-list',
        'name'  => 'Integration Master Replace Exclusion List',
        'route' => 'admin.integration.master.update-exclusion-list',
        'sort'  => 30,
    ],[
        'key'   => 'integration-master.exclusion-list.delete-exclusion-item',
        'name'  => 'Integration Master Delete Exclusion Item',
        'route' => 'admin.integration.master.delete-exclusion-item',
        'sort'  => 40,
    ],[
        'key'   => 'integration-master.exclusion-list.save-exclusion-item',
        'name'  => 'Integration Master Save Exclusion Item',
        'route' => 'admin.integration.master.save-exclusion-item',
        'sort'  => 50,
    ],

];
