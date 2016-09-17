<?php
require "twiliolib/Services/Twilio.php";
function send_Sms($phoneNum, $msg){
	//printf("number: %s \n msg: %s", $phoneNum, $msg);

	//return;
	$AccountSid = "AC883ace0e82efe5dd5c08c6550adae88e"; // Your Account SID from www.twilio.com/console
	$AuthToken = "30b23223a8b969970a556645514f9ecf";   // Your Auth Token from www.twilio.com/console


	//$client = new Services_Twilio($AccountSid, $AuthToken);
	$client = new Services_Twilio($AccountSid, $AuthToken);

	try {
	    /*$message = $client->account->messages->create(array(
	        "From" => "+17273501397 ", // From a valid Twilio number
	        "To" => $phoneNum, // Text this number
	        "Body" => $msg,
	    )); */
	    $message = $client->account->messages->sendMessage(
	        "+17273501397", // From a valid Twilio number
	        $phoneNum, // Text this number
	        $msg
	    );
	    return "success";
	} catch (Services_Twilio_RestException $e) {
	    return $e->getMessage();
	}



}



?>