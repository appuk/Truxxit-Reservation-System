<?php
require_once('model/fields.php');
require_once('model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('cardnum');
$fields->addField('cvv');
$fields->addField('cardexpiry');

include ('view/view_card_details.php');

/** will be done soon...
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'goBack';
	header("location: welcome.php");
} else { // update profile 
	
    if ('user_type' == 'customer') {
		header("location: edit_profile_customer");
	} else if ('user_type' == 'driver' ) {
		header("location: edit_driver_profile");
	} else {
		echo ("not sure :("); 
	}
}
*/
?>