<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'government/add-government' => 'government/add-government',
                'government/view-government/<id:\d+>' => 'government/view-government',
                'multiplier/add-multiplier' => 'multiplier/add-multiplier',
                'multiplier/view-multiplier/<id:\d+>' => 'multiplier/view-multiplier',
                'factory/add-factory' => 'factory/add-factory',
                'factory/view-factory/<id:\d+>' => 'factory/view-factory',
                'association/add-association' => 'association/add-association',
                'association/view-association/<id:\d+>' => 'association/view-association',
                'brand/add-brand' => 'brand/add-brand',
                'brand/view-brand/<id:\d+>' => 'brand/view-brand',
                'partner/add-partner' => 'partner/add-partner',
                'partner/view-partner/<id:\d+>' => 'partner/view-partner',
                'academia/add-academia' => 'academia/add-academia',
                'academia/view-academia/<id:\d+>' => 'academia/view-academia',
                'index' => 'index',
    
                // Add more rules for other pages if necessary
            ],
        ],
    ],
    'params' => $params,
];
