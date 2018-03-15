<?php
require 'vendor/autoload.php';
define('SITE_URL','http://localhost:88/paypal_testing2/index.html');
$paypal=new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'Af8rIfXeGCbdJ1T9P_BNGfQf3kuZOuQ4B6CulxYDTdyJStBM0d4Di--p9rCp8p2FTzlBEmHx8pPGon75',
		'ENDBaqcq7E03qvhtm_l0Glb1t9BBlrBPR5IjLBZGs73fjwqCmngegPZ_xttByZiTQHvFnEhjBM8ESv_T'
	)
)
?>