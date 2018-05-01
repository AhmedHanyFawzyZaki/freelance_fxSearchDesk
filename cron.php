<?php
ini_set('max_execution_time', '-1');
ini_set('memory_limit', '-1'); 
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-framework/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/console.php';// we'll use a separate config file

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
 
// including Yii
require_once($yii);
// creating and running console application
Yii::createConsoleApplication($config)->run();

?>