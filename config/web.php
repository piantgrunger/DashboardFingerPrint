<?php

use kartik\datecontrol\Module;

$params = require __DIR__ . '/params.php';

$config = [

    'id' => 'Template',
    'name' => 'Application',
    // set target language to be Indonesia
  'language' => 'id-ID',
    'as access' => [
     'class' => '\hscstudio\mimin\components\AccessControl',
     'allowActions' => [
        // add wildcard allowed action here!
       // 'lokasi/*',
   
     'site/logout',
    'gii/*',
        'debug/*',
        'mimin/*', // only in dev modewuw
        'route/*',
        'role/*',
        'user/*'
   
     ],
    ],

    'modules' => [
     

     'mimin' => [
        'class' => '\hscstudio\mimin\Module',
     ],
    ],

  // set source language to be English
    'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
       'i18n' => [
        'translations' => [
            'kvgrid' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@vendor/kartik-v/yii2-grid/messages',
            ],
        ],
         ],

        
        'formatter' => [
            'dateFormat' => 'dd MMM yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'Rp',
        ],

        

        'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'language' => 'id',
                        'version' => '3.1.18',
                    ],
                ],
            ],
        ],

       'authManager' => [
        'class' => 'yii\rbac\DbManager', // only support DbManager
        
        'itemTable' => 'skpi.{{%auth_item}}',
 
    'itemChildTable' => 'skpi.{{%auth_item_child}}',
  
    'assignmentTable' => 'skpi.{{%auth_assignment}}',
  
    'ruleTable' => 'skpi.{{%auth_rule}}',

    
       ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
          
            'cookieValidationKey' => 'y2B_PhmMeo1G4hPY0dO7KfNled31dl6L',
          //  'csrfParam' => '_csrf',
            'enableCsrfValidation' => false,
        ],
        /*
        'view' => [
          'theme' => [
              'pathMap' => [
                 '@app/views' => '@app/templates/views',
           ],
         ],
        ],
        */

        'urlManager' => [
       'class' => 'yii\web\UrlManager',
       // Hide index.php
       'showScriptName' => false,
       // Use pretty URLs
       'enablePrettyUrl' => true,
       'rules' => [
       ],
        ],
       'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            
            //'enableAutoLogin' => true,
         
         
            'enableSession' => true,
            'authTimeout' => 60 * 30,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            /*
            // if using Gmail
            // turn on at less secure apps
            // https://www.google.com/settings/security/lesssecureapps
            // please set in params.php too
            'viewPath' => '@app/mail',
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.gmail.com',
                'username'=>'youremail@gmail.com',
                'password'=>'your password',
                'port'=>'587',
                'encryption'=>'tls',
            ],
            */
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
        'db' => require(__DIR__ . '/db.php'),
    
        
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
       'allowedIPs' => ['*']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
        'myCrud' => [
            'class' => 'app\templates\crud\Generator',
            'templates' => [
                'my' => '@app/Templates/crud/default',
            ],
        ],
        'mymodel' => [
            'class' => 'app\templates\model\Generator',
            'templates' => [
                'my' => '@app/Templates/model/default',
            ],
            
        ],
        ],
    ];
}

return $config;
