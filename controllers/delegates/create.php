<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$circuits = $db->query('SELECT * FROM tbl_circuit')->get();
$churches = $db->query('SELECT * FROM tbl_church')->get();

view('registrar_dashboard.php', [
     'circuits' => $circuits,
     'churches' => $churches
]);