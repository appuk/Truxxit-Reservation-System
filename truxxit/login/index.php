<?php
require_once('model/fields.php');
require_once('model/validate.php');
session_start();
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('login_ID');
$fields->addField('password');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'reset';
} else {
    $action = strtolower($action);
}

switch ($action) {
    case 'reset':
		$login_ID = '';
        $password = '';
        
        include 'view/register.php';
        break;
    case 'Login':
        // Copy form values to local variables
		$_SESSION["id"] = "1";
		$login_ID = trim(filter_input(INPUT_POST, 'login_ID'));
        $password = filter_input(INPUT_POST, 'password');

        // Validate form data
		$validate->text('login_ID', $login_ID);
		$validate->text('password', $password);		
 

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/homepage.php';
        }
        break;
}
?>