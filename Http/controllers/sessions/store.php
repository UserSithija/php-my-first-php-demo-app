<?php

#log in the user if the credentials match.

use Http\Forms\Authenticator;
use Http\Forms\LoginForm;




$form = LoginForm::validate($attributes = [

  'email' => $_POST['email'],
  'password' => $_POST['password'],

]);



$signedIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);



if (!$signedIn) {

  $form->error('email', 'No matching account found  for that email address and password')->throw();
}

redirect('/');








#we  hvae a user, but we don't know if the password provided matches what we have in the database


#password validation faild
