<?php

namespace App\Security;

use App\DI\Service;

class Security {

  public static function varifyRoute(){
    if (!self::varifyUser()) {
			return Service::get('app')->redirect('login');
		}
  }

  public static function varifyUser(){
    $userData = Service::get('config')['user'];

    if (self::getUser()) {
      return true;
    }

    if (isset($_POST) && isset($_POST[login]) && isset($_POST[pass])){
      if ($userData[$_POST[login]] == $_POST[pass]) {
        self::setUser($_POST['login']);
        return true;
      }
    }
    return false;
  }

  public static function setUser($name) {
    $_SESSION['userName'] = $name;
    $_SESSION['auth'] = 1;
  }

  public static function getUser() {
    if (isset($_SESSION['auth'])) {
      return $_SESSION['userName'];
    } else {
      return false;
    }
  }

}
