<?php

class DB
{
  /** @var PDO */
  private $pdo;

  private function getConnection()
  {
    $config = include 'config.php';

    if (!$this->pdo) {
      $this->pdo = new PDO("mysql:host={$config['host']}:{$config['port']};dbname={$config['db_name']}",
        $config['db_user'], $config['db_password']);
    }
    return $this->pdo;
  }

  public function fetchAll(string $query, array $params = [])
  {
    $pdo = $this->getConnection();
    $prepared = $pdo->prepare($query);
    $ret = $prepared->execute($params);
    if (!$ret) {
      $errorInfo = $prepared->errorInfo();
      trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
      return [];
    }
    $data = $prepared->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
  }

  public function fetchOne(string $query, $params = [])
  {
    $pdo = $this->getConnection();
    $prepared = $pdo->prepare($query);
    $ret = $prepared->execute([$params]);
    if (!$ret) {
      $errorInfo = $prepared->errorInfo();
      trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
      return [];
    }
    $data = $prepared->fetch(\PDO::FETCH_ASSOC);
    if (!$data) {
      return false;
    }
    return $data;
  }

  public function exec(string $query, array $params = [])
  {
    $pdo = $this->getConnection();
    $prepared = $pdo->prepare($query);
    $ret = $prepared->execute($params);
    if (!$ret) {
      $errorInfo = $prepared->errorInfo();
      trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
      return -1;
    }
    return true;
  }

  public function lastInsertId()
  {
    return $this->getConnection()->lastInsertId();
  }
}