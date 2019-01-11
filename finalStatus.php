<?php

include 'config.inc.php';

/* Get Transactions details back from database */

$response = array();
$response = $_REQUEST;
//echo "<pre>";print_r($response);exit;
$getData = "SELECT * from transactions WHERE paymentId = " . $response['PaymentID'];

$query = sql_Query($getData, $db);

$Data = sql_Fetch($query);
//var_dump($Data);exit;
if ( sql_NumRows($query) > 0 ) {

    $to = $Data['email'];

    $subject = 'Flyhi Transcation Confirmation';

    if ($Data['result'] == "SUCCESS") {
        $status = "Success";
    } else {
        $status = "Failed";
    }
                    
    if( $Data['currency'] == 'INR' ){
        $currency = '₹';
    }else if( $Data['currency'] == 'USD' ){
        $currency = '$';
    }else{
        $currency = 'S$';
    }

    $message = "<p>Hello " . $Data['name'] . ",</p><p>Below are the Details of your Transaction :</p>";

    $message .= '<table align="center"  border="2">
                            
                    <tr>
                        <td colspan="35">Transaction PaymentID</td>				
                        <td>' . $Data['paymentId'] . '</td>				
                    </tr>
                    <tr>
                        <td colspan="35">Transaction Date</td>				
                        <td>' . date('M dS,Y', strtotime($Data['tranDate'])) . '</td>				
                    </tr>
                    <tr>
                        <td colspan="35">Transaction Reference No</td>				
                        <td>' . $Data['ref'] . '</td>				
                    </tr>
                    <tr>
                        <td colspan="35">Transaction ID</td>				
                        <td>' . $Data['tranId'] . '</td>				
                    </tr>
                    <tr>
                        <td colspan="35">Transaction Amount</td>				
                        <td>' . $currency . $Data['amount'] . '</td>				
                    </tr>
                    <tr>
                        <td colspan="35">Transaction Status</td>				
                        <td>' . $status . '</td>				
                    </tr>';
}

$message .= '</table>';

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'From: pranalidarole@gmail.com' . "\r\n";

/* Send Mail to the user if Transaction is successful */
if (mail($to, $subject, $message, $headers)) {
    $emailID = $Data['email'];
}else{
        header('Location: ' . "http://www.flyhi.in/PayOnline.php?paymentId=" . $Data['paymentId']);
	die();
}

if($Data['tranId'] != "" ){
	header('Location: ' . "http://www.flyhi.in/PayOnline.php?tranId=" . $Data['tranId']);
	die();
}else{
	header('Location: ' . "http://www.flyhi.in/PayOnline.php?paymentId=" . $Data['paymentId']);
	die();
}
?>
