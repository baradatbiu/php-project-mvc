<?php

class modelFile
{
  static function getFiles(int $id)
  {
    $db = new DB();
    $query = "SELECT * FROM files WHERE user_id = $id";
    $files = $db->fetchAll($query);
    return $files;
  }
}
