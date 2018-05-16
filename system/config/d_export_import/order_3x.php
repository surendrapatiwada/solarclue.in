<?php
$_['opencart_version'] = array(
    "3.0.0.0",
    "3.0.1.1",
    "3.0.1.2",
    "3.0.2.0");
$_['main_sheet'] = array(
    'name' => 'Order',
    'event_export' => array(
        'extension/d_export_import_module/order/export'
        ),
    'event_inport' => array(
        'extension/d_export_import_module/order/import'
        ),
    'table' =>  array(
        'name' => 'o',
        'full_name' => 'order',
        'key' => 'order_id'
        ),
    'tables' => array(
        array(
            'name' => 'oh',
            'full_name' => 'order_history',
            'key' => 'order_id',
            'join' => 'INNER'
            //'multi_language' => 1
            ),
        array(
            'name' => 'oo',
            'full_name' => 'order_option',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
        array(
            'name' => 'op',
            'full_name' => 'order_product',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
        array(
            'name' => 'or',
            'full_name' => 'order_recurring',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
        array(
            'name' => 'os',
            'full_name' => 'order_shipment',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
        array(
            'name' => 'ot',
            'full_name' => 'order_total',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
		array(
            'name' => 'ov',
            'full_name' => 'order_voucher',
            'join' => 'LEFT',
            'key' => 'order_id',
            'concat' => 1
            ),
        array(
            'name' => 'su',
            'full_name' => 'seo_url',
            'key' => 'query',
            'related_key' => 'query',
            'prefix' => 'order_id=',
            'clear' => 1,
            'not_empty' => 1,
            'join' => 'LEFT',
            'multi_language' => 1
            )
        ),
    'columns' => array(
        array(
            'column' => 'order_id',
            'table' => 'o',
            'name' => 'Order ID',
            'filter' => 1
            ),
        array(
            'column' => 'invoice_no',
            'table' => 'o',
            'name' => 'Invoice No',
            'filter' => 1
            ),
        array(
            'column' => 'store_name',
            'table' => 'o',
            'name' => 'Store Name',
            'filter' => 1
            ),
        array(
            'column' => 'firstname',
            'table' => 'o',
            'name' => 'Firstname',
            'filter' => 1
            ),
        array(
            'column' => 'lastname',
            'table' => 'o',
            'name' => 'Lastname',
            'filter' => 1
            ),
        array(
            'column' => 'email',
            'table' => 'o',
            'name' => 'Email',
            'filter' => 1
            ),
        array(
            'column' => 'telephone',
            'table' => 'o',
            'name' => 'Telephone',
            'filter' => 1
            )
        )
);

$_['sheets'] = array();
