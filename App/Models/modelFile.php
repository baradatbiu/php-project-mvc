<?php

class modelFile extends DB
{
  public function getFiles(int $id)
  {
    $query = "SELECT * FROM files WHERE user_id = $id";
    $files = $this->fetchAll($query);
    return $files;
  }
}
