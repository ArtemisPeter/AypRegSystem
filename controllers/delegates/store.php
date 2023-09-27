<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$firstNameInput = $_POST['firstName'];
$lastNameInput = $_POST['lastName'];
$nicknameInput = $_POST['nickname'];
$ageInput = $_POST['age'];
$contactInput = $_POST['contact'];
$circuitInput = $_POST['circuit'];
$churchInput = $_POST['church'];
$delegateTypeInput = $_POST['delegateType'];

// validate user inputs
$errors = [];
     // validate contact
          // if age is valid: must not be negative, must still be alive (not 100 years old)
          if($ageInput <=0)
          {
               $errors['age'] = 'Age must not be negative.';
          } else if(!Validator::age($ageInput, 12, INF))
          {
               $errors['age'] = 'you must at least be 12 years old.';
          }
          // if contact is a number
          if(!Validator::number($contactInput))
          { 
               $errors['contact'] = "Invalid input, contact must be numeric.";
          } else
          // if contact starts with 0 and has a length of 11, in short if contact is in contact form
          if(!Validator::contact($contactInput))
          {
               $errors['contact'] = "Invalid input, contact must start with 0 and be 11 digits long.";
          }
     // validate circuit
     $circuitDB = $db->query('SELECT * FROM tbl_circuit WHERE Circuit = :circuit', [
          'circuit' => $circuitInput
     ])->find();
     if(!$circuitDB)
     {
          $errors['circuit'] = "Please enter a registered circuit.";
     }
     // validate church
     $churchDB = $db->query('SELECT * FROM tbl_church WHERE Church = :church', [
          'church' => $churchInput
     ])->find();
          // if church exist
          if(!$churchDB)
          {
               $errors['church'] = "Please enter a registered church.";
          } else
          // if in the circuit
          if($churchDB['circuit_id'] !== $circuitDB['circuit_id'])
          {
               $errors['church'] = "Church not in the specified circuit.";
          } else 
          {
               $church_id = $churchDB['church_id'];
          }
     
// check if delegate already exist
     // if yes, error['delegate']
     $delegateDB = $db->query('SELECT * FROM tbl_delegate')->get();
     $delegateExists = False;
     foreach($delegateDB as $delegate) {
          if(strtoupper($delegate['fname']) === strtoupper($firstNameInput) && strtoupper($delegate['lname']) === strtoupper($lastNameInput)) {
               $delegateExists = True;
               $existingDelegate = $delegate;
               break;
          }
     }
     if($delegateExists)
     {
          $errors['delegate'] = "Delegate already registered.";
          if($existingDelegate['church_id'] !== $church_id){
               $delegateExistsChurch = $db->query("SELECT * FROM tbl_church WHERE church_id = :church_id", [
                    'church_id' => $existingDelegate['church_id']
               ])->find();
               $errors['delegate'] = "Delegate already registered at: <b> {$delegateExistsChurch['Church']}</b>.";
          }
     }
if(!empty($errors))
{
     return view('registrar_dashboard.php', [
          'errors' => $errors
     ]);
     exit();
}
// insert into database
$db->query("INSERT INTO tbl_delegate (fname, lname, nickname, age, del_type_id, church_id, contact_num) 
VALUES (:firstName, :lastName, :nickname, :age, :delegateType, :churchId, :contact)", [
     "firstName" => $firstNameInput,
     "lastName" => $lastNameInput,
     "nickname" => $nicknameInput,
     "age" => $ageInput,
     "delegateType" => $delegateTypeInput,
     "churchId" => $church_id,
     "contact" => $contactInput
]);
$success = "Delegate registered successfuly!";
return view('registrar_dashboard.php', [
     'success' => $success
]);