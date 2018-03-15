<?php
require 'vendor/autoload.php';
define('SITE_URL','http://localhost:88/paypal_testing2/index.html');
$paypal=new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'ClientID',
		'Secret Key'
	)
)
?>
