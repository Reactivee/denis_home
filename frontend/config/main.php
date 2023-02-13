<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
require_once __DIR__ . '/../../common/helpers/helpers.php';
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languagepicker'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            'root' => [
                '@frontend/messages',
                '@vendor',
                '/some/external/folder',
            ],
            'scanRootParentDirectory' => true, // Whether scan the defined `root` parent directory, or the folder itself.
            // IMPORTANT: for detailed instructions read the chapter about root configuration.
            'layout' => 'language',         // Name of the used layout. If using own layout use 'null'.
            'allowedIPs' => ['127.0.0.1'],  // IP addresses from which the translation interface is accessible.
            'roles' => ['@'],               // For setting access levels to the translating interface.
            'tmpDir' => '@runtime',         // Writable directory for the client-side temporary language files.
            // IMPORTANT: must be identical for all applications (the AssetsManager serves the JavaScript files containing language elements from this directory).
            'phpTranslators' => ['::t'],    // list of the php function for translating messages.
            'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
            'patterns' => ['*.js', '*.php'],// list of file extensions that contain language elements.
            'ignoredCategories' => ['yii'], // these categories won't be included in the language database.
            'onlyCategories' => ['yii'],    // only these categories will be included in the language database (cannot be used together with "ignoredCategories").
            'ignoredItems' => ['config'],   // these files will not be processed.
            'scanTimeLimit' => null,        // increase to prevent "Maximum execution time" errors, if null the default max_execution_time will be used
            'searchEmptyCommand' => '!',    // the search string to enter in the 'Translation' search field to find not yet translated items, set to null to disable this feature
            'defaultExportStatus' => 1,     // the default selection of languages to export, set to 0 to select all languages by default
            'defaultExportFormat' => 'json',// the default format for export, can be 'json' or 'xml'
            'tables' => [                   // Properties of individual tables
                [
                    'connection' => 'db',   // connection identifier
                    'table' => '{{%language}}',         // table name
                    'columns' => ['name', 'name_ascii'],// names of multilingual fields
                    'category' => 'database-table-name',// the category is the database table name
                ]
            ],
            'scanners' => [ // define this if you need to override default scanners (below)
                '\lajax\translatemanager\services\scanners\ScannerPhpFunction',
                '\lajax\translatemanager\services\scanners\ScannerPhpArray',
                '\lajax\translatemanager\services\scanners\ScannerJavaScriptFunction',
                '\lajax\translatemanager\services\scanners\ScannerDatabase',
            ],
        ],
    ],
    'language' => 'en',
    'components' => [
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',        // List of available languages (icons and text)
            'languages' => ['en' => 'English', 'uz' => 'Uzbek', 'ru' => 'Русский'],
            'cookieName' => 'language',                         // Name of the cookie.
            'expireDays' => 64,                                 // The expiration time of the cookie is 64 days.
            'callback' => function () {
                if (!\Yii::$app->user->isGuest) {
                    $user = \Yii::$app->user->identity;
                    $user->language = \Yii::$app->language;
                    $user->save();
                }
            }
        ],
        'i18n' => [
            'translations' => [
                'main*' => [
                    'sourceLanguage' => 'sr',  // EDIT  THE  LINE
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                ],
            ],
        ],

//        'i18n' => [
//            'translations' => [
//                'frontend*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
////                    'basePath' => '@frontend/messages',
//                    'fileMap' => [
//                        'messages' => 'main.php',
//                        'app/error' => 'error.php',
//                    ],
//                ],
//            ],
//        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'zelal-frontend',
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

        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
//            'enableDefaultLanguageUrlCode' => true,
//            'enableLanguagePersistence' => false,
            'languages' => ['uz', 'ru', 'en'],
            'enableLanguageDetection' => false,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [

//                ['class' => 'yii\rest\UrlRule', 'controller' => 'site'],
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],

                'locations' => 'site/locations',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<slug:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ],
        ],


    ],
    'params' => $params,
];
