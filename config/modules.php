<?php

return [
    'admin' => [
        'class' => 'mdm\admin\Module',
        'layout' => 'left-menu', //กำหนดเมนูอยู่ด้านซ้าย
        'menus' => [
            'assignment' => [
                'label' => 'Grant Access', // change label
            ],
            //   'route' => null, // disable menu
        ],
    ],
    'user' => [
        'class' => 'dektrium\user\Module',
        'enableConfirmation' => false,
        'cost' => 12,
        'admins' => ['admin'],
    ],
    'rbac' => 'dektrium\rbac\RbacWebModule',

    'gridview' => [
       'class' => '\kartik\grid\Module',
    ],

    //เพิ่ม app\modules
    'depress' => [
        'class' => 'app\modules\depress\Module',
    ],
    'hosxp' => [
        'class' => 'app\modules\hosxp\Module',
    ],
    'wsc' => [
        'class' => 'app\modules\wsc\Module',
    ],
    'chkchart' => [
        'class' => 'app\modules\chkchart\Module',
    ],
];
