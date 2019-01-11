<?php

$txnResult = isset($_GET['ResResult']) ? $_GET['ResResult'] : '';
$txnTrackID= isset($_GET['ResTrackId']) ? $_GET['ResTrackId'] : '';
$txnPaymentID = isset($_GET['ResPaymentId']) ? $_GET['ResPaymentId'] : '';
$txnRef= isset($_GET['ResRef']) ? $_GET['ResRef'] : '';
$txnTranID = isset($_GET['ResTranId']) ? $_GET['ResTranId'] : '';
$txnAmount= isset($_GET['ResAmount']) ? $_GET['ResAmount'] : '';
$txnError = isset($_GET['ResError']) ? $_GET['ResError'] : '';
$txnEmail = isset($_GET['EmailId']) ? $_GET['EmailId'] : '';
$txnName = isset($_GET['Name']) ? $_GET['Name'] : '';
$txnAddress = isset($_GET['Address']) ? preg_replace('/\_/',' ', strip_tags($_GET['Address'])) : '';
$txnPhoneNo = isset($_GET['PhoneNo']) ? $_GET['PhoneNo'] : '';

include 'config.inc.php'; 

$db = sql_Connect($HOST, $USER, $PASS, $DBNAME);

$query = "INSERT INTO transaction_detail(result,trackId,amount,paymentId,ref,tranId,status,name,address,phoneno,emailId,tranDate) VALUES('$txnResult',$txnTrackID,$txnAmount,$txnPaymentID,$txnRef,$txnTranID,'$txnError','$txnName','$txnAddress','$txnPhoneNo','$txnEmail','".date('Y-m-d H:i:s')."')";

if($InsertTransaction = sql_Query($query, $db)){

    $to      = $txnEmail;

    $subject = 'Flyhi Transcation Confirmation';

    $message = "<p>Hello ".$txnName.",</p><p>Your Transaction has been Proccessed Successfully!</p><p>Below are the Details of your Transaction :</p>";

    $message .= '<table align="center"  border="2">
                            
                            <tr>
                                    <td colspan="35">Transaction PaymentID</td>				
                                    <td>'.$txnPaymentID.'</td>				
                            </tr>

                            <tr>
                                    <td colspan="35">Transaction Reference No</td>				
                                    <td>'.$txnRef.'</td>				
                            </tr>

                            <tr>
                                    <td colspan="35">Transaction ID</td>				
                                    <td>'.$txnTranID.'</td>				
                            </tr>
                            <tr>
                                    <td colspan="35">Transaction Amount</td>				
                                    <td>'.$txnAmount.'</td>				
                            </tr>

                            </table>';

    $headers = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: pranalidarole@gmail.com' . "\r\n";

    if(mail($to, $subject, $message, $headers)){
        header('Location: '."http://www.flyhi.in/PayOnline.php?Status=Success&Email=".urlencode($txnEmail));
        die();
    }
}
?>
<html>
<body>

  <br><br> <br><br> 
	<table border="1" align="center" >
	<tr>
		<th colspan="50" bgcolor="#9999FF" ><p style= "color:White">Final Response  
    </th>
	</tr>
		
	<tr>
		<td>
			<table align="center"  border="2">
			<tr>
				<td colspan="35">Transaction Status</td>				
				<td><?php echo $txnResult;?> <td>				
			</tr>
			
			<tr>
				<td colspan="35">Merchant Reference No:[TRACK_ID]</td>				
				<td><?php echo $txnTrackID;?></td>				
			</tr>
			<tr>
				<td colspan="35">Transaction PaymentID</td>				
				<td> <?php echo $txnPaymentID;?></td>				
			</tr>
						
			<tr>
				<td colspan="35">Transaction Reference No</td>				
				<td> <?php echo $txnRef;?></td>				
			</tr>
			
			<tr>
				<td colspan="35">Transaction ID</td>				
				<td> <?php echo $txnTranID;?></td>				
			</tr>
			<tr>
				<td colspan="35">Transaction Amount</td>				
				<td> <?php echo $txnAmount;?></td>				
			</tr>
			
			<tr>
				<td colspan="35">Transaction Error</td>				
				<td><?php echo $txnError;?> </td>				
			</tr>
			
			
			
			
			</table>
		</td>
	</tr>
	</table>
<br><br><br><br><br>
<center><A href="index.php"><p style="color:blue"><b>Click here to go to Home Page</b></p></A></center>
       
</body>
</html>
<!-- Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only ment for demonstration, this page should not be used in production
- Transaction data should only be accepted once from a browser at the point of input, and then kept in a way that does not allow others to modify it (example server session, database  etc.)
- Any transaction information displayed to a customer, such as amount, should be passed only as display information and the actual transactional data should be retrieved from the secure source last thing at the point of processing the transaction.
- Any information passed through the customer's browser can potentially be modified/edited/changed/deleted by the customer, or even by third parties to fraudulently alter the transaction data/information. Therefore, all transaction information should not be passed through the browser to Payment Gateway in a way that could potentially be modified (example hidden form fields). 
 -->