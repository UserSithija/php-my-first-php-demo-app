<?php
// return [
//   '/' => 'controllers/index.php',
//   '/about' => 'controllers/about.php',
//   '/contact' => 'controllers/contact.php',
//   '/notes' => 'controllers/notes/index.php',
//   '/note' => 'controllers/notes/show.php',
//   '/notes/create' => 'controllers/notes/create.php',
// ];


$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/notes', 'notes/index.php');
$router->delete('/notes', 'notes/destroy.php');
//$router->post('/notes', '/notes/index.php');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');
$router->patch('/notes', 'notes/update.php');
$router->get('/note/edit', 'notes/edit.php');


$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/sessions', 'sessions/store.php')->only('guest');
$router->delete('/sessions', 'sessions/destroy.php')->only('auth');
