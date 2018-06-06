<?php
$_['opencart_version'] = array(
    "2.0.0.0",
    "2.0.1.0",
    "2.0.1.1",
    "2.0.2.0",
    "2.0.3.1",
    "2.1.0.1",
    "2.1.0.2",
    "2.2.0.0",
    "2.3.0.0",
    "2.3.0.1",
    "2.3.0.2");
$_['main_sheet'] = array(
    'name' => 'Categories',
    'event_export' => array(
        'extension/d_export_import_module/category/export'
        ),
    'event_inport' => array(
        'extension/d_export_import_module/category/import'
        ),
    'table' =>  array(
        'name' => 'c',
        'full_name' => 'category',
        'key' => 'category_id'
        ),
    'tables' => array(
        array(
            'name' => 'cd',
            'full_name' => 'category_description',
            'key' => 'category_id',
            'join' => 'INNER',
            'multi_language' => 1
            ),
        array(
            'name' => 'c2s',
            'full_name' => 'category_to_store',
            'join' => 'LEFT',
            'key' => 'category_id',
            'concat' => 1
            ),
        array(
            'name' => 'ua',
            'full_name' => 'url_alias',
            'key' => 'query',
            'related_key' => 'query',
            'prefix' => 'category_id=',
            'clear' => 1,
            'not_empty' => 1,
            'join' => 'LEFT'
            )
        ),
    'columns' => array(
        array(
            'column' => 'category_id',
            'table' => 'c',
            'name' => 'Product ID',
            'filter' => 1
            ),
        array(
            'column' => 'name',
            'table' => 'cd',
            'name' => 'Name',
            'filter' => 1
            ),
        array(
            'column' => 'parent_id',
            'table' => 'c',
            'name' => 'Parent ID',
            'filter' => 1
            ),
        array(
            'column' => 'top',
            'table' => 'c',
            'name' => 'Top',
            'filter' => 1
            ),
        array(
            'column' => 'column',
            'table' => 'c',
            'name' => 'Column',
            'filter' => 1
            ),
        array(
            'column' => 'sort_order',
            'table' => 'c',
            'name' => 'Sort Order',
            'filter' => 1
            ),
        array(
            'column' => 'status',
            'table' => 'c',
            'name' => 'Status',
            'filter' => 1
            ),
        array(
            'column' => 'meta_title',
            'table' => 'cd',
            'name' => 'Meta Title',
            'filter' => 1
            ),
        
        array(
            'column' => 'store_id',
            'table' => 'c2s',
            'name' => 'Store ID',
            'concat' => 1
            )
        )
);

$_['sheets'] = array();
