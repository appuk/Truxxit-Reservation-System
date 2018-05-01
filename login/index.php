<?php
require_once('model/fields.php');
require_once('model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('login_ID');
$fields->addField('password', 'Must be at least 6 characters.');

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
    case 'register':
        // Copy form values to local variables
		$login_ID = trim(filter_input(INPUT_POST, 'login_ID'));
        $password = filter_input(INPUT_POST, 'password');

        // Validate form data
		$validate->text('login_ID', $login_ID);
        $validate->password('password', $password);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/success.php';
        }
        break;
}
?>