<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{


  function attempt($email, $password)
  {
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email= :email', [
      'email' => $email,
    ])->findOrFail();

    if ($user) {

      if (password_verify($password, $user['password'])) {
        $this->login(
          [
            'email' => $email,
          ]
        );
        return true;
      }
    }

    return false;
  }

  function login($user)
  {

    $_SESSION['user'] = ['email' => $user['email']];
    session_regenerate_id(true);
  }
  function logout()
  {
    Session::destroy();
  }
}
