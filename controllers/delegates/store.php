<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$circuit = $_POST['circuit'];
$church = $_POST['church'];
$delegateType = $_POST['delegateType'];

// validate user inputs
$errors = [];
     // validate contact
          // if contact is a number
               if(!Validator::number($contact))
               { 
                    $errors['contact'] = "Invalid input, contact must be numeric.";
               } else
          // if contact starts with 0 and has a length of 11, in short if contact is in contact form
               if(!Validator::contact($contact))
               {
                    $errors['contact'] = "Invalid input, contact must start with 0 and be 11 digits long.";
               }
     // validate circuit
          $circuits = $db->query('SELECT * FROM tbl_circuit WHERE Circuit = :circuit', [
               'circuit' => $circuit
          ])->find();
          if(!$circuits)
          {
               $errors['circuit'] = "Please enter a valid circuit.";
          }
     // validate church
     $churches = $db->query('SELECT * FROM tbl_church WHERE Church = :church', [
          'church' => $church
     ])->find();
          // if church exist
               if(!$churches)
               {
                    $errors['church'] = "Please enter a valid church.";
               } else
          // if in the circuit
               if($churches['circuit_id'] !== $circuits['circuit_id'])
               {
                    $errors['church'] = "Church not in the specified circuit.";
               }
// check if delegate already exist
     // if yes, error['delegate']
     // if($db->query('SELECT * FROM tbl_church WHERE Church = :circuit', [
     //      'circuit' => $circuit
     // ])->find())
     // {
     //      $errors['delegate'] = "Delegate already registered.";
     // }
if(!empty($errors))
{
     view('registrar_dashboard.php', [
          'errors' => $errors
     ]);
     exit();
}
// insert into database
dd('Delegate registered!');