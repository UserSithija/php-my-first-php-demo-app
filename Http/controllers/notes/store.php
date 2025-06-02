<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
require base_path('Core/Validator.php');


$db = new Database($config['database']);




$errors = [];



$body = $_POST['body'];



if (!Validator::string($body, 1, 500)) {

  $errors['body'] = 'A body of no more that 500 charactors is Required';
}


if (!empty($errors)) {
  return view('notes/create.view.php', [

    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}


$db->query('INSERT INTO notes(body,user_id) VALUES(:body,:user_id)', [
  'body' => $_POST['body'],
  'user_id' => 1,
]);
header('location: /notes');
die();
