<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$username = $_POST['username'];
$password = $_POST['password'];

// verify user input
$errors = [];


// check if user exist
$user = $db->query('SELECT * FROM tbl_users WHERE username = :username', [
     'username' => $username
])->find();

if(! $user) {
     return view('login.php', [
          'errors' => [
               'username' => 'user not found'
          ]
     ]);
}

// check if correct password
if($password !== $user['password'])
{
     return view('login.php', [
          'errors' => [
               'password' => 'incorrect pasword'
          ]
     ]);
}

// create session
login([
     'username' => $username
]);

header('location: /');
exit;
