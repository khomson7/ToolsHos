<?php

return [
    'class' => 'mdm\admin\components\AccessControl',
    'allowActions' => [
        'site/index',
        'site/api-err',
        'site/auto-login',
        'site/logout',
        'site/login',
        // 'user/registration/register',
        'chkchart/default/chkchart',
        'depress/default/all-auto-sm',
        'depress/default/index',
        'depress/line/curl-depress',
        // 'admin/*',
    ],
];
