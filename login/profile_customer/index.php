<?php
require_once('model/fields.php');
require_once('model/validate.php');
include '../session.php';

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('login_ID');
$fields->addField('email');
$fields->addField('password');
$fields->addField('verify');
$fields->addField('membership');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('zip');
$fields->addField('sex');
$fields->addField('DOB');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'display';
	echo "displaying your profile, one second...";
	include 'view/profile_view_customer.php';
} else if ($action == "Cancel") {
	header("location: ../welcome.php");
	die();
} else { // update profile 
	if ($_SESSION['user_type'] == 'customer') {
		header("location: edit");
		die();
	} else {
		echo ("not sure :("); 
	}
}
?>
