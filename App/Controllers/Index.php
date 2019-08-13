<?php

class Index
{
  /** @var View */
  public $view;

  public function listAction()
  {
    if (!$_SESSION["user_id"]) {
      header('Location: /index/index');
      return false;
    }
    $modelUser = new modelUser();

    $this->view->users = $modelUser->getAllUsers();
  }

  public function filelistAction()
  {
    $userId = $_SESSION["user_id"];
    if (!$userId) {
      header('Location: /index/index');
      return false;
    }
    $modelFile = new modelFile();
    $this->view->files = $modelFile->getFiles();
  }

  public function regAction()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['login'] && $_POST["password"] && $_POST["confirm_password"]) {

      if ($_POST['password'] !== $_POST["confirm_password"]) {
        return false;
      }

      $modelUser = new modelUser();
      $user = $modelUser->userRegister($_POST, $_FILES['photo']);

      $_SESSION["user_id"] = $user;
      header('Location: /index/list');
    } else {
      return false;
    }
  }

  public function indexAction()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['login'] && $_POST["password"]) {
      $modelUser = new modelUser();
      $user = $modelUser->userAuth($_POST);

      if (!$user) {
        return false;
      }

      $_SESSION["user_id"] = $user;
      header('Location: /index/list');
    } else {
      return false;
    }
  }
}
