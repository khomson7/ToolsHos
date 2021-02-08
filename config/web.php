<?php

Yii::setAlias('@themes', dirname(__DIR__) . '/themes');
Yii::setAlias('@root', realpath(dirname(__FILE__) . '/../../'));
$params = require __DIR__ . '/params_.php';
$db = require __DIR__ . '/db.php';
$db2 = require __DIR__ . '/dbhos.php';
/* เรียกใช้งาน จาก as_access.php*/
$as_access = require __DIR__ . '/as_access.php';
$modules = require __DIR__ . '/modules.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'Tools-Hos',
    'language' => 'th_TH',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
	
        
        
            'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 60 * 1,
        ],

        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],

        /*
	'session' => [
		    
            'class' => 'yii\web\Session',
          
            'cookieParams' => ['httponly' => true, 'lifetime' => (60 * 30)],
            'timeout' => (60 * 30),
            'useCookies' => true,
        ], */
        /*
          'urlManager' => [
          'class' => 'yii\web\UrlManager',
          // Disable index.php
          'showScriptName' => false,
          // Disable r= routes
          'enablePrettyUrl' => false,
          'rules' => array(
          '<controller:\w+>/<id:\d+>' => '<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
          '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
          'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
          ),
          ],
         */

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ktJ92WR_UtcmsJ9qjxHdYapx8JK3kXDx',
            /*
            'parsers' => [
                'application/json' => 'yii\web\JsonParser', //เพิ่มการใช้งาน json
            ]
            */
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*
          'user' => [
          'identityClass' => 'app\models\User',
          'enableAutoLogin' => true,
          ], */
        'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
		
		'class' => 'dektrium\rbac\components\DbManager',
           // 'class' => 'yii\rbac\PhpManager',
        //'class' => 'yii\rbac\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
           // 'maxSourceLines' => 20,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'db2' => $db2,
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'modules' => $modules,
    'as access' => $as_access,
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
    //  ];

 //   $config['bootstrap'][] = 'gii';
   $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
