<?php
$_['opencart_version'] = array(
    "3.0.0.0",
    "3.0.1.1",
    "3.0.1.2",
    "3.0.2.0");
$_['main_sheet'] = array(
    'name' => 'Manufacturer',
    'event_export' => array(
        'extension/d_export_import_module/manufacturer/export'
        ),
    'event_inport' => array(
        'extension/d_export_import_module/manufacturer/import'
        ),
    'table' =>  array(
        'name' => 'm',
        'full_name' => 'manufacturer',
        'key' => 'manufacturer_id'
        ),
    'tables' => array(
        array(
            'name' => 'm2s',
            'full_name' => 'manufacturer_to_store',
            'join' => 'LEFT',
            'key' => 'manufacturer_id',
            'concat' => 1
            ),
		array(
            'name' => 'su',
            'full_name' => 'seo_url',
            'key' => 'query',
            'related_key' => 'query',
            'prefix' => 'manufacturer_id=',
            'clear' => 1,
            'not_empty' => 1,
            'join' => 'LEFT',
            'multi_language' => 1
            )
        ),
    'columns' => array(
        array(
            'column' => 'manufacturer_id',
            'table' => 'm',
            'name' => 'Manufacturer ID',
            'filter' => 1
            ),
        array(
            'column' => 'name',
            'table' => 'm',
            'name' => 'Name',
            'filter' => 1
            ),
        array(
            'column' => 'store_id',
            'table' => 'm2s',
            'name' => 'Storer ID',
			'concat' => 1
            )	
        )
);

$_['sheets'] = array();
