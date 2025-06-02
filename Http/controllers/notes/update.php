<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id =:id', [

  "id" => $_POST['id'],
])->findOrFail();

authorized($note['user_id'] === $currentUserId);


$errors = [];



$body = $_POST['body'];



if (!Validator::string($body, 1, 500)) {

  $errors['body'] = 'A body of no more that 500 charactors is Required';
}


if (!empty($errors)) {
  return view('notes/create.view.php', [

    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
  ]);
}

$db->query('UPDATE notes SET body=:body WHERE id=:id', [
  "body" => $_POST['body'],
  "id" => $_POST['id']
]);
header('location:/notes');
die();
