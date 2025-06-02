<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];
//validate the form inputs
if (!Validator::email($email)) {
  $errors['email'] = "please provide a valid email address";
}
if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'please provide a password of at least seven charactors ';
}
if (!empty($errors)) {
  return view('registration/create.view.php', ['errors' => $errors]);
}

//check if the account already exsist

$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email,
])->find();



#if yes,redirect to a login page
if ($user) {

  header('location:/');
  exit();
} else {


  #if not,save one to the database, and log the user in,and ridirect to the Home page
  $db->query('INSERT INTO users(email,password) VALUES(:email,:password) ', [
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT)
  ]);

  //mark that the user has logged in

  login([
    'email' => $email,
  ]);

  header('location:/');
  exit();
}
