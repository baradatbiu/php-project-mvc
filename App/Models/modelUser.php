<?php

class modelUser
{
  public function userAuth($userData)
  {
    $user = $this->getUserByLogin($userData["login"]);
    $password = $this->genPasswordHash($userData["password"]);
      if ($user && ($user["password"] === $password)) {
      return $user["id"];
    } else {
      return false;
    }
  }

  static function getAllUsers()
  {
    $db = new DB();
    $users = $db->fetchAll('SELECT * FROM users ORDER BY age');
    return $users;
  }

  public function getUserByLogin(string $login)
  {
    $db = new DB();
    $user = $db->fetchOne('SELECT * FROM users WHERE login LIKE ?', $login);
    return $user;
  }

  public function userRegister(array $userData, $file)
  {
    $user = $this->getUserByLogin($userData["login"]);
    if (!$user) {
      $password = $this->genPasswordHash($userData["password"]);
      $db = new DB();
      $fileName = basename($file['name']);
      $filePath = '/img/' . $fileName;
      $filePut = __DIR__ . '/../../public' . $filePath;
      $tmp_name = $file["tmp_name"];
      move_uploaded_file($tmp_name, "$filePut");
      $userData['photo'] = $filePath;
      $db->exec(
        "INSERT INTO users (`login`, password, name, age, description, photo)
                VALUES (:login, :pass, :name, :age, :description, :photo)",
        [
          'login' => $userData["login"],
          'pass' => $password,
          'name' => $userData["name"],
          'age' => $userData["age"],
          'description' => $userData["description"],
          'photo' => $userData["photo"]
        ]
      );

      $userId = $db->lastInsertId();

      $db->exec(
        "INSERT INTO files (user_id, name, url)
                VALUES (:user_id, :name, :url)",
        [
          'user_id' => $userId,
          'name' => $fileName,
          'url' => $userData["photo"]
        ]
      );

      return $userId;

    } else {
      return false;
    }
  }

  public static function genPasswordHash(string $password)
  {
    return sha1($password . 'hg56hc5');
  }
}