<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' =>  'pgsql:host=180.250.165.150;port=5432;dbname=iainmigrasi',
    'username' => 'iain',
    'password' => 'ampelakademik!3',
    'charset' => 'utf8',
    'schemaMap' => [ 'pgsql'=> [ 'class'=>'yii\db\pgsql\Schema', 'defaultSchema' => 'skpi' //specify your schema here
     ] ],
    ];
