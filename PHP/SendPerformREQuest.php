<?php
/*
 *  TranPortal ID 	9000525
    terminal_alias_id_str :Locale text not found 	9000525
    TranPortal Password 	password1
 *  new console password : flyhi!@#123
 * 
 * 
******************************************************************
			* COMPANY    - FSS Pvt. Ltd.
******************************************************************
Name of the Program : Hosted UMI Sample Pages
Page Description    : Allows Merchant to connect Payment Gateway and send request
Request parameters  : TranporatID,TranportalPassword,Action,Amount,Currency,Merchant 
                      Response/Error URL & TrackID,Language,UDF1-UDF
Hashing Parameters	: TranporatID,TrackID,Amount,Currency,Action
Response parameters : Payment Id, Pay Page URL, Error
Values from Session : No 
Values to Session   : No
Created by          : FSS Payment Gateway Team
Created On          : 12-03-2013
Version             : Version 4.1
****************************************************************
The set of pages are developed and tested using below set of hardware and software only. 
In case of any issues noticed by merchant during integration, merchant can contact respective bank 
for technical assistance

NOTE - 
This sample pages are developed and tested on below platform

PHP  Version     - 5.3.5
Web/App Server   - Apache 2.2.17/Wamp 2.1
Operating System - Windows 2003/7
*****************************************************************
*/

/*
IMPORTANT INFORMATION
This document is provided by Financial Software and System Pvt Ltd on the basis 
that you will treat it as private and confidential.
Data used in examples and sample data files are intended to be fictional and any 
resemblance to real persons or entities is entirely coincidental.
This example assumes that a form has been sent to this example with the required 
fields. The example then processes the command and displays the receipt or error 
to a HTML page in the users web browser.
*/

/*

Before merchant uses this page in his environment, merchant to ensure
below changes are made in the pages - 
1. Merchant sets Tranportal ID / Password provided by Bank in respective 
places
2. Merchant collects the transaction track Id and amount from his database
3. Merchant changes the Response URL / Error URL as per his website
*/

/*  
sign "&" is mandatory to mention with in the end of passed value, in below section 
this to make the string  Merchant can use their own logic of creating the string 
with required inputs, below is just a basic method on how to create a request 
string and pass the values to Payment Gateway 
*/

/*Getting Transaction Amount and Merchant TrackID from Initial HTML page
Since this sample page for demonstration, values from HTML page are directly
taken from browser and used for transaction processing. Merchants SHOULD NOT
follow this practice in production environment. */

/*
The merchant developer should ensure the track id passed here is from merchant
database
*/


$TranTrackid=isset($_POST['MTrackid']) && $_POST['MTrackid'] !="" ? $_POST['MTrackid'] : ' 9000525';

/*
The merchant developer should ensure the transaction amount passed here is 
from merchant database
*/
$TranAmount=isset($_POST['MAmount']) ? $_POST['MAmount'] : '';

/* to pass Tranportal ID provided by the bank to merchant. Tranportal ID is sensitive information
of merchant from the bank, merchant MUST ensure that Tranportal ID is never passed to customer 
browser by any means. Merchant MUST ensure that Tranportal ID is stored in secure environment & 
securely at merchant end. Tranportal Id is referred as id. Tranportal ID for test and production will be 
different, please contact bank for test and production Tranportal ID*/
//$ReqTranportalId="id=XXXX";
$ReqTranportalId="id=9000525";

/* to pass Tranportal password provided by the bank to merchant. Tranportal password is sensitive 
information of merchant from the bank, merchant MUST ensure that Tranportal password is never passed 
to customer browser by any means. Merchant MUST ensure that Tranportal password is stored in secure 
environment & securely at merchant end. Tranportal password is referred as password. Tranportal 
password for test and production will be different, please contact bank for test and production
Tranportal password */
//$ReqTranportalPassword="password=XXXXXXX";
$ReqTranportalPassword="password=password1";

/* Amount passed here should be from merchant backend system like database and not from customer browser*/
$ReqAmount="amt=".$TranAmount;

/* Track Id passed here should be from merchant backend system like database and not from customer browser*/
$ReqTrackId="trackid=".$TranTrackid;

/* Currency code of the transaction. By default INR i.e. 356 is configured. If merchant wishes 
to do multiple currency code transaction, merchant needs to check with bank team on the available 
currency code */
$ReqCurrency="currencycode=356";

/* Transaction language, THIS MUST BE ALWAYS USA. */
$ReqLangid="langid=USA";

/* Action Code of the transaction, this refers to type of transaction. Action Code 1 stands of 
Purchase transaction and action code 4 stands for Authorization (pre-auth). Merchant should 
confirm from Bank action code enabled for the merchant by the bank */ 
$ReqAction="action=1";


/* Response URL where Payment gateway will send response once transaction processing is completed 
Merchant MUST esure that below points in Response URL
1- Response URL must start with http://
2- the Response URL SHOULD NOT have any additional paramteres or query string  */
//$ReqResponseUrl="responseURL=http://www.merchantdemo.com/GetHandleRESponse.php";
$ReqResponseUrl="responseURL=http://flyhi.in/PHP/GetHandleRESponse.php";

/* Error URL where Payment gateway will send response in case any issues while processing the transaction 
Merchant MUST esure that below points in ErrorURL 
1- error url must start with http://
2- the error url SHOULD NOT have any additional paramteres or query string */ 
//$ReqErrorUrl="errorURL=http://www.merchantdemo.com/StatusTRAN.php";
$ReqErrorUrl="errorURL=http://flyhi.in/PHP/GetHandleRESponse.php";


/* User Defined Fileds as per Merchant or bank requirment. Merchant MUST ensure merchant 
merchant is not passing junk values OR CRLF in any of the UDF. In below sample UDF values 
are not utilized */
$ReqUdf1="udf1=Test1";
$ReqUdf2="udf2=Test2";
$ReqUdf3="udf3=Test3";
$ReqUdf4="udf4=Test4";

/*
NOTE -
ME should now do the validations on the amount value set like - 
a) Transaction Amount should not be blank and should be only numeric
b) Language should always be USA
c) Action Code should not be blank
d) UDF values should not have junk values and CRLF 
(line terminating parameters)Like--> [ !#$%^&*()+[]\\\';,{}|\":<>?~` ]
*/


/*==============================HASHING LOGIC CODE START==============================================*/
	/*Below are the fields/prametres which will use for hashing using (GetSHA256) hashing 
	Algorithm,and need to pass same hashed valued in UDF5 filed only*/
	
//	$strhashTID=trim("XXXX"); 			 //USE Tranportal ID FIELD Value FOR HASHING 
	$strhashTID=trim("9000525"); 			 //USE Tranportal ID FIELD Value FOR HASHING 
	$strhashtrackid=trim($TranTrackid);	 //USE Trackid FIELD Value FOR HASHING 
	$strhashamt=trim($TranAmount);  		 //USE Amount FIELD Value FOR HASHING 
	$strhashcurrency=trim("356");			 //USE Currencycode FIELD Value FOR HASHING 
	$strhashaction=trim("1");				 //USE Action code FIELD Value FOR HASHING 
	
	//Create a Hashing String to Hash
	$str = trim($strhashTID.$strhashtrackid.$strhashamt.$strhashcurrency.$strhashaction);
	
	//Use hash method which is defined below for Hashing ,It will return Hashed valued of above string
	$hashstring= hash('sha256', $str); 

	$ReqUdf5="udf5=".$hashstring;      // Passed Calculated Hashed Value in UDF5 Field 
	
/*==============================HASHING LOGIC CODE END==============================================*/		

/*
ME should now do the validations on the amount value set like - 
a) Transaction Amount should not be blank and should be only numeric
b) Language should always be USA
c) Action Code should not be blank
d) UDF values should not have junk values and CRLF (line terminating parameters)Like--> [ !#$%^&*()+[]\\\';,{}|\":<>?~` ]
*/

/* Now merchant sets all the inputs in one string for passing to the Payment Gateway URL */		
$param=$ReqTranportalId."&".$ReqTranportalPassword."&".$ReqAction."&".$ReqLangid."&".$ReqCurrency."&".$ReqAmount."&".$ReqResponseUrl."&".$ReqErrorUrl."&".$ReqTrackId."&".$ReqUdf1."&".$ReqUdf2."&".$ReqUdf3."&".$ReqUdf4."&".$ReqUdf5;

/* This is Payment Gateway Test URL where merchant sends request. This is test enviornment URL, 
production URL will be different and will be shared by Bank during production movement */
$url = "https://securepgtest.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet";

/* 
Log the complete request in the log file for future reference
Now creating a connection and sending request
Note - In PHP CURL function is used for sending TCPIP request
*/
$ch = curl_init() or die(curl_error()); 
curl_setopt($ch, CURLOPT_POST,1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$param); 
curl_setopt($ch, CURLOPT_PORT, 443); // port 443
curl_setopt($ch, CURLOPT_URL,$url);// here the request is sent to payment gateway 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0); //create a SSL connection object server-to-server
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); 
$data1=curl_exec($ch) or die(curl_error());

curl_close($ch); 

$response = $data1;
            try
			{
				/* Insert User Details to database with paymentId*/
				/*$inserPaymentId = "insert into transactions(name,email,address,contact,trackId,tranDate) values('Pranali Ashok Darole','chetantest5@gmail.com','Testing',932155096,".$TranTrackid.",'".date('Y-m-d H:i:s')."')";

				if(sql_Query($inserPaymentId, $db)){
					

					$TrackPid = mysql_insert_id();*/
				
					$index=strpos($response,"!-");
					$ErrorCheck=substr($response, 1, $index-1);//This line will find Error Keyword in response
					if($ErrorCheck == 'ERROR')//This block will check for Error in response
					{
						// here redirecting the error page 
	//					$failedurl='http://www.merchantdemo.com/StatusTRAN.php?ResTrackId='.$TranTrackid.'&ResAmount='.$TranAmount.'&ResError='.$response;

						/*$updateStatus = "UPDATE transactions SET status='".$ErrorCheck."',result='NOT CAPTURED' WHERE id=".$TrackPid;

						if(sql_Query($updateStatus, $db)){*/
							$failedurl='http://flyhi.in/PHP/StatusTRAN.php?ResTrackId='.$TranTrackid.'&ResAmount='.$TranAmount.'&ResError='.$response;
							header("location:". $failedurl );
						//}
						
													
					}
					else
					{
						// If Payment Gateway response has Payment ID & Pay page URL		
						$i =  strpos($response,":");
						// Merchant MUST map (update) the Payment ID received with the merchant Track Id in his database at this place.
						$paymentId = substr($response, 0, $i);
						$paymentPage = substr( $response, $i + 1);

						/*$updateStatus = "UPDATE transactions SET paymentId=".$paymentId.",paymentUrl='".$paymentPage."' WHERE id=".$TrackPid;*/

						//if(sql_Query($updateStatus, $db)){
							// here redirecting the customer browser from ME site to Payment Gateway Page with the Payment ID
							$r = $paymentPage . "?PaymentID=" . $paymentId;
							header("location:". $r );
						//}
					}
				//}
							
			}
			catch(Exception $e)
			{
				var_dump($e->getMessage());
			}
?>
