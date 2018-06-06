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
    'name' => 'Customer',
    'event_export' => array(
        'extension/d_export_import_module/customer/export'
        ),
    'event_inport' => array(
        'extension/d_export_import_module/customer/import'
        ),
    'table' =>  array(
        'name' => 'c',
        'full_name' => 'customer',
        'key' => 'customer_id'
        ),
    'tables' => array(
        array(
            'name' => 'ca',
            'full_name' => 'customer_activity',
            'key' => 'customer_id',
            'join' => 'INNER'
            //'multi_language' => 1
            ),
        array(
            'name' => 'caf',
            'full_name' => 'customer_affiliate',
            'join' => 'LEFT',
            'key' => 'customer_id',
            'concat' => 1
            ),
        array(
            'name' => 'cap',
            'full_name' => 'customer_approval',
            'join' => 'LEFT',
            'key' => 'customer_id',
            'concat' => 1
            ),
        array(
            'name' => 'ci',
            'full_name' => 'customer_ip',
            'join' => 'LEFT',
            'key' => 'customer_id',
            'concat' => 1
            ),
        array(
            'name' => 'cr',
            'full_name' => 'customer_reward',
            'join' => 'LEFT',
            'key' => 'customer_id',
            'concat' => 1
            ),
        array(
            'name' => 'ct',
            'full_name' => 'customer_transaction',
            'join' => 'LEFT',
            'key' => 'customer_id',
            'concat' => 1
            ),
        array(
            'name' => 'ua',
            'full_name' => 'url_alias',
            'key' => 'query',
            'related_key' => 'query',
            'prefix' => 'customer_id=',
            'clear' => 1,
            'not_empty' => 1,
            'join' => 'LEFT'
            )
        ),
    'columns' => array(
        array(
            'column' => 'customer_id',
            'table' => 'c',
            'name' => 'Customer ID',
            'filter' => 1
            ),
        array(
            'column' => 'firstname',
            'table' => 'c',
            'name' => 'Firstname',
            'filter' => 1
            ),
        array(
            'column' => 'lastname',
            'table' => 'c',
            'name' => 'Lastname',
            'filter' => 1
            ),
        array(
            'column' => 'email',
            'table' => 'c',
            'name' => 'Email',
            'filter' => 1
            ),
        array(
            'column' => 'telephone',
            'table' => 'c',
            'name' => 'Telephone',
            'filter' => 1
            ),
        array(
            'column' => 'cart',
            'table' => 'c',
            'name' => 'Cart',
            'filter' => 1
            ),
        array(
            'column' => 'ip',
            'table' => 'c',
            'name' => 'IP',
            'filter' => 1
            ),
        array(
            'column' => 'company',
            'table' => 'caf',
            'name' => 'Company',
            'concat' => 1
            ),
        array(
            'column' => 'website',
            'table' => 'caf',
            'name' => 'Website',
            'concat' => 1
            ),
        array(
            'column' => 'order_id',
            'table' => 'cr',
            'name' => 'Order ID',
            'concat' => 1
            )
        )
);

$_['sheets'] = array();
