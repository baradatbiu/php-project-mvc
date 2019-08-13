<?php
require_once '../vendor/autoload.php';
$config = include 'config.php';

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => $config['host'],
  'database'  => $config['db_name'],
  'username'  => $config['db_user'],
  'password'  => $config['db_password'],
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
