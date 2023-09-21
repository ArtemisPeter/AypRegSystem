<?php 

$router->get('/login', 'controllers/sessions/create.php')->only('guest');
$router->post('/sessions', 'controllers/sessions/store.php')->only('guest');

$router->get('/', 'controllers/delegates/create.php')->only('auth');
$router->post('/register', 'controllers/delegates/store.php')->only('auth');


