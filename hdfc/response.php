<?php 
session_start();
$HASHING_METHOD = 'sha512'; // md5,sha1

// This response.php used to receive and validate response.
if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
	
$hashData = $_SESSION['SECRET_KEY'];
ksort($_REQUEST);
foreach ($_REQUEST as $key => $value){
	if (strlen($value) > 0 && $key != 'SecureHash') {
		$hashData .= '|'.$value;
	}
}

if (strlen($hashData) > 0) {
	$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
	
		
		if($_REQUEST['ResponseCode'] == 0){
			// update response and the order's payment status as SUCCESS in to database
			
			//for demo purpose, its stored in session
			$_REQUEST['paymentStatus'] = 'SUCCESS';
			$_SESSION['paymentResponse'][$_REQUEST['PaymentID']] = $_REQUEST;
			
		} else {
			// update response and the order's payment status as FAILED in to database
			
			//for demo purpose, its stored in session
			$_REQUEST['paymentStatus'] = 'FAILED';
			$_SESSION['paymentResponse'][$_REQUEST['PaymentID']] = $_REQUEST;
		}
		// Redirect to confirm page with reference.
		$confirmData = array();
		$confirmData['PaymentID'] = $_REQUEST['PaymentID'];
		$confirmData['Status'] = $_REQUEST['paymentStatus'];
		$confirmData['Amount'] = $_REQUEST['Amount'];
		
		$hashData = $_SESSION['SECRET_KEY'];

		ksort($confirmData);
		foreach ($confirmData as $key => $value){
			if (strlen($value) > 0) {
				$hashData .= '|'.$value;
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
		}
?>
		<html>
		<body onLoad="document.payment.submit();">
		<form action="confirm.php" name="payment" method="POST">
<?php
			foreach($confirmData as $key => $value) {
?>
		<input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
<?php
			}
?>
		<input type="hidden" value="<?php echo $secureHash; ?>" name="SecureHash"/>
		</form>
		</body>
		</html>
<?php

	
} else {
	echo '<h1>Error!</h1>';
	echo '<p>Invalid response</p>';
}
?>
