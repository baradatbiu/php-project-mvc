<?php
require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
  "driver" => "mysql",
  "host" => "localhost",
  "database" => "shop",
  "username" => "root",
  "password" => "",
  "charset" => "utf8",
  "collation" => "utf8_unicode_ci",
  "prefix" => "",
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

Capsule::schema()->dropIfExists('products');
Capsule::schema()->create('products', function ($table) {
  $table->increments('id');
  $table->string('title');
  $table->integer('price');
  $table->text('photo');
  $table->text('info')->nullable();
  $table->text('category_id');
  $table->timestamps();
});
Capsule::schema()->dropIfExists('categories');
Capsule::schema()->create('categories', function ($table) {
  $table->increments('id');
  $table->integer('title');
  $table->integer('product_id');
  $table->timestamps();
});
