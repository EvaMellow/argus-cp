<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
            //SETTING FOR MATERIAL DASHBOARD THEME
            'bundles' => [
                'deyraka\materialdashboard\web\MaterialDashboardAsset',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yP6XVEGHRJa2ZFD03C61oB4OcA-SEttA',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                 'files' => 'files/index',
            ],
        ],
    ],
    'params' => $params,
   'controllerMap' => [
    'elfinder/connector' => [
        'class' => 'mihaildev\elfinder\Controller',
        'access' => ['@'],
        'root' => [
            'path' => 'uploads',
            'name' => 'Files',
            'driver' => 'LocalFileSystem',
            'options' => [
                'watermark' => [
                    'source' => __DIR__.'/logo.png',
                    'marginRight' => 5,
                    'marginBottom' => 5,
                    'quality' => 95,
                    'transparency' => 70,
                    'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP,
                    'targetMinPixel' => 200,
                ],
            ],
        ],
        'connectorRoute' => 'elfinder/connector',
    ],
],
'modules' => [
    'elfinder' => [
        'class' => 'mihaildev\yii2-elfinder\Module',
        // дополнительные настройки модуля
    ],]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '85.249.20.203'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '85.249.20.203'],
    ];
}

return $config;
