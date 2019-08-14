<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

use modelFile as File;

class modelUser extends Eloquent
{
  protected $table = 'users';
  public $timestamps = false;
  protected $fillable = ['login', 'name', 'password', 'description', 'age', 'photo'];

  public function file()
  {
    return $this->hasMany('File');
  }

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

  public function getAllUsers()
  {
    return $this->all()->sortBy('age');
  }

  public function getUserByLogin(string $login)
  {
    $user = $this->query()->where('login', $login)->first()->toArray();
    return $user;
  }

  public function getUserById(string $userId)
  {
    $user = $this->query()->where('id', $userId)->first()->toArray();
    return $user;
  }

  public function userRegister(array $userData, $file)
  {
    $user = $this->query()->where('login', $userData["login"])->first();
    if ($user === null) {
      $password = $this->genPasswordHash($userData["password"]);
      $userData["password"] = $password;
      $fileName = basename($file['name']);
      $filePath = '/img/' . $fileName;
      $filePut = __DIR__ . '/../../public' . $filePath;
      $tmp_name = $file["tmp_name"];
      move_uploaded_file($tmp_name, "$filePut");
      $userData['photo'] = $filePath;

      self::query()->create($userData);

      $newUser = $this->getUserByLogin($userData["login"]);
      $userId = $newUser['id'];

      File::query()->create([
        'user_id' => $userId,
        'name' => $fileName,
        'url' => $userData["photo"]
      ]);

      return $userId;

    } else {
      return false;
    }
  }

  public function userUpdate(array $userData, $userId, $file)
  {
    if ($file['name']) {
      $fileName = basename($file['name']);
      $filePath = '/img/' . $fileName;
      $filePut = __DIR__ . '/../../public' . $filePath;
      $tmp_name = $file["tmp_name"];
      move_uploaded_file($tmp_name, "$filePut");
      $userData['photo'] = $filePath;

      File::query()->where('user_id', $userId)->update(['url' => $userData["photo"]]);
    }
    $this->query()->where('id', $userId)->update($userData);
  }

  public static function genPasswordHash(string $password)
  {
    return sha1($password . 'hg56hc5');
  }
}