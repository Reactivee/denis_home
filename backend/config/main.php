<?php

use backend\modules\translatemanager\models\Language;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'translatemanager' => [
            'class' => 'backend\modules\translatemanager\Module',
            'allowedIPs' => ['*',],
            'ignoredCategories' => [
                'yii',
                'language',
            ],

        ],
        'admin' => [
            'class' => 'backend\modules\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => '@backend/modules/admin/views/layouts/main_old.php',
        ],
        'gridview' => ['class' => 'kartik\grid\Module', 'downloadAction' => 'gridview/export/download',]
    ],
    'homeUrl' => '/admin',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d-M-Y',
            'datetimeFormat' => 'php:d-M-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Asia/Tashkent',
            'timeZone' => 'Asia/Tashkent'
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//            'authTimeout' => 300,
//            'as afterLogin' => 'common\behaviors\LoginTimestampBehavior'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'languagepicker' => [
            'class' => 'common\components\languagepicker\Component',
            'languages' => function () {
                return Language::getLanguageNames(true);
            }
        ],
        'urlManager' => [
            //'scriptUrl'=>'/backend/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]

    ],
    'params' => $params,
//    'as access' => [
//        'class' => 'backend\modules\admin\components\AccessControl',
//        'allowActions' => [
//            'site/login',
//            'site/logout',
//            'site/error',
//        ]
//    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'plugin' => [
                [
                    'class' => '\mihaildev\elfinder\plugin\Sluggable',
                    'lowercase' => true,
                    'replacement' => '-'
                ]
            ],
            'root' => [
                'baseUrl' => '@uploadsUrl',
                'basePath' => '@uploadsPath',
                'path' => '/',
                'name' => 'Files'
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5,          // Margin right pixel
                'marginBottom' => 5,          // Margin bottom pixel
                'quality' => 95,         // JPEG image save quality
                'transparency' => 70,         // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ]
    ],
];
