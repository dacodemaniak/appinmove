<?php
define('_SLACK_WEBHOOK', 'https://hooks.slack.com/services/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');


// On autorise les requêtes qui viennent d'un autre domaine (Cross Domain)
if (isset($_SERVER['HTTP_ORIGIN'])) {
	// Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
	// you want to allow, and if so:
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		// may also be using PUT, PATCH, HEAD etc
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			
			exit(0);
}

$postedData = file_get_contents("php://input");
if($postedData){
	$dateTime =  date("d-m-Y H:i:s");
	$content = $dateTime . "\n";
	$datas = json_decode($postedData);
	foreach($datas as $name => $data){
		$content .= $name . "\t" . $data . "\n";
	}
	// Définit l'enveloppe Slack
	$message = array(
		"payload" => json_encode(array("text" => $content))
	);
	// Utilise CURL pour transmettre le message dans le channel
	$curl = curl_init(_SLACK_WEBHOOK);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $message);
	curl_exec($curl);
	curl_close($curl);
	
	/*$fh = fopen("contact/contact.csv", "a+");
	if($fh){
		fwrite($fh, $content);
		fclose($fh);
	}*/
}
echo json_encode(array("sended" => true));