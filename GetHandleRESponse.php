<?php
/*
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
Disclaimer:- Important Note in Pages
- Transaction data should only be accepted once from a browser at the point of input, and then kept 
in a way that does not allow others to modify it (example server session, database  etc.)

- Any transaction information displayed to a customer, such as amount, should be passed only as 
display information and the actual transactional data should be retrieved from the secure source 
last thing at the point of processing the transaction.

- Any information passed through the customer's browser can potentially be modified/edited/changed
/deleted by the customer, or even by third parties to fraudulently alter the transaction data/
information. Therefore, all transaction information should not be passed through the browser to 
Payment Gateway in a way that could potentially be modified (example hidden form fields). 
*/

/* 
BELOW ARE LIST OF PARAMETERS THAT WILL BE RECEIVED BY MERCHANT FROM PAYMENT GATEWAY 
*/

include 'config.inc.php'; 

$db = sql_Connect($HOST, $USER, $PASS, $DBNAME);

$HDFCPG = sql_Fetch(sql_Query("Select ResponseUrl,StatusTRANUrl,Tranportalid from hdfc_pg_detail", $db));

try
{
	/* Capture the IP Address from where the response has been received */
	$strResponseIPAdd = getenv('REMOTE_ADDR');

	/* Check whether the IP Address from where response is received is PG IP */
	if ($strResponseIPAdd != "221.134.101.174" && $strResponseIPAdd != "221.134.101.169" && $strResponseIPAdd != "198.64.129.10" && $strResponseIPAdd != "198.64.133.213")
	{
		/*
		IMPORTAN NOTE - IF IP ADDRESS MISMATCHES, ME LOGS DETAILS IN LOGS,
		UPDATES MERCHANT DATABASE WITH PAYMENT FAILURE, REDIRECTS CUSTOMER 
		ON FAILURE PAGE WITH RESPECTIVE MESSAGE
		*/
		/*
		<!-- 
		to get the IP Address in case of proxy server used
		function getIPfromXForwarded() { 
		$ipString=@getenv("HTTP_X_FORWARDED_FOR"); 
		$addr = explode(",",$ipString); 
		return $addr[sizeof($addr)-1]; 
		} 
		*/
//		$REDIRECT = 'REDIRECT=http://www.merchantdemo.com/StatusTRAN.php?ResError=--IP MISSMATCH-- Response IP Address is: '.$strResponseIPAdd;
		$REDIRECT = 'REDIRECT='.$HDFCPG['StatusTRANUrl'].'?ResError=--IP MISSMATCH-- Response IP Address is: '.$strResponseIPAdd;
		echo $REDIRECT;
	}
	else
	{
            
	/*Variable Declaration*/
	/*=========================================================================================*/
	$ResErrorText= isset($_POST['ErrorText']) ? $_POST['ErrorText'] : ''; 	//Error Text/message
	$ResPaymentId = isset($_POST['paymentid']) ? $_POST['paymentid'] : '';	//Payment Id
	$ResTrackID = isset($_POST['trackid']) ? $_POST['trackid'] : '';        //Merchant Track ID
	$ResErrorNo = isset($_POST['Error']) ? $_POST['Error'] : '';            //Error Number
	$ResResult = isset($_POST['result']) ? $_POST['result'] : '';           //Transaction Result
	$ResPosdate = isset($_POST['postdate']) ? $_POST['postdate'] : '';      //Postdate
	$ResTranId = isset($_POST['tranid']) ? $_POST['tranid'] : '';           //Transaction ID
	$ResAuth = isset($_POST['auth']) ? $_POST['auth'] : '';                 //Auth Code		
	$ResAVR = isset($_POST['avr']) ? $_POST['avr'] : '';                    //TRANSACTION avr					
	$ResRef = isset($_POST['ref']) ? $_POST['ref'] : '';                    //Reference Number also called Seq Number
	$ResAmount = isset($_POST['amt']) ? $_POST['amt'] : '';                 //Transaction Amount
	$Resudf1 = isset($_POST['udf1']) ? $_POST['udf1'] : '';                  //UDF1
	$Resudf2 = isset($_POST['udf2']) ? $_POST['udf2'] : '';                  //UDF2
	$Resudf3 = isset($_POST['udf3']) ? $_POST['udf3'] : '';                  //UDF3
	$Resudf4 = isset($_POST['udf4']) ? $_POST['udf4'] : '';                  //UDF4
	$Resudf5 = isset($_POST['udf5']) ? $_POST['udf5'] : '';                  //UDF5			
											
/*LIST OF PARAMETERS RECEIVED BY MERCHANT FROM PAYMENT GATEWAY ENDS HERE */
/*/=================================================================================================	*/
      
/* 
First check, if error number is NOT present,then go for Hashing using required parameters 
*/
/* 
NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE. Since the
logging mechanism is merchant driven, the sample code for same is not provided in this
pages
*/
		if ($ResErrorNo == '')	
		{          
					/*******************HASHING CODE LOGIC START************************************/
					/*IMP NOTE: For Hashing below listed parameters have been used. In case merchant develops 
					his/her own pages, merchant to 		make note of these parameters to ensure hashing 
					logic remains same.
					Tranportal ID, TrackID, Amount, Result, Payment ID, Reference Number, Auth Code, Transaction ID 
				
					If any Hashing parameters is null of blank then merchant need to exclude those parameters 
					from hashing*/					
									
					/*
					USE Tranportal ID FIELD as one parameter for hashing.
					Tranportal ID is a sensitive parameter, Merchant can store the Tranportal ID field in 
					database as well in page as config value. We recommend merchant storing this parameter 
					in database and then calling from database.
					*/
//					$strHashTraportalID=trim("XXXXX"); //USE Tranportal ID FIELD FOR HASHING ,Mercahnt need to take this filed value  from his Secure channel such as DATABASE.
					$strHashTraportalID=trim($HDFCPG['Tranportalid']); //USE Tranportal ID FIELD FOR HASHING ,Mercahnt need to take this filed value  from his Secure channel such as DATABASE.
					$strhashstring="";            //Declaration of Hashing String 
					
					$strhashstring=trim($strHashTraportalID);
					
					//Below code creates the Hashing String also it will check NULL and Blank parmeters and exclude from the hashing string
					if ($ResTrackID != '' && $ResTrackID != null )
					$strhashstring=trim($strhashstring).trim($ResTrackID);					
					if ($ResAmount != '' && $ResAmount != null )
					$strhashstring=trim($strhashstring).trim($ResAmount);					
					if ($ResResult != '' && $ResResult != null )
					$strhashstring=trim($strhashstring).trim($ResResult);					
					if ($ResPaymentId != '' && $ResPaymentId != null )
					$strhashstring=trim($strhashstring).trim($ResPaymentId);					
					if ($ResRef != '' && $ResRef != null )
					$strhashstring=trim($strhashstring).trim($ResRef);					
					if ($ResAuth != '' && $ResAuth != null )
					$strhashstring=trim($strhashstring).trim($ResAuth);					
					if ($ResTranId != '' && $ResTranId != null )
					$strhashstring=trim($strhashstring).trim($ResTranId);					
										
					//Use sha256 method which is defined below for Hashing ,It will return Hashed valued of above strin					
					$hashvalue= hash('sha256', $strhashstring); 					
					
					/*******************HASHING CODE LOGIC END************************************/
					
					if ($hashvalue == $Resudf5)
					{
					/* NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE */
					/*IMPORTANT NOTE - MERCHANT DOES RESPONSE HANDLING AND VALIDATIONS OF 
					TRACK ID, AMOUNT AT THIS PLACE. THEN ONLY MERCHANT SHOULD UPDATE 
					TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
					AND THEN REDIRECT CUSTOMER ON RESULT PAGE*/

					/* !!IMPORTANT INFORMATION!!
					During redirection, ME can pass the values as per ME requirement.
					NOTE: NO PROCESSING should be done on the RESULT PAGE basis of values passed in the RESULT PAGE from this page. 
					ME does all validations on the responseURL page and then redirects the customer to RESULT PAGE ONLY FOR RECEIPT PRESENTATION/TRANSACTION STATUS CONFIRMATION
					For demonstration purpose the result and track id are passed to Result page	*/
					
					/* Hashing Response Successful	*/
									
//						$REDIRECT = 'REDIRECT=http://www.merchantdemo.com/StatusTRAN.php?ResResult='.$ResResult.'&ResTrackId='.$ResTrackID.'&ResAmount='.$ResAmount.'&ResPaymentId='.$ResPaymentId.'&ResRef='.$ResRef.'&ResTranId='.$ResTranId.'&ResError='.$ResErrorText.'Hashing Response Successful';
						$REDIRECT = 'REDIRECT='.$HDFCPG['StatusTRANUrl'].'?ResResult='.$ResResult.'&ResTrackId='.$ResTrackID.'&ResAmount='.$ResAmount.'&ResPaymentId='.$ResPaymentId.'&ResRef='.$ResRef.'&ResTranId='.$ResTranId.'&ResError='.$ResErrorText.'Hashing Response Successful'.'&EmailId='.$Resudf1.'&Name='.$Resudf2.'&Address='.$Resudf3.'&PhoneNo='.$Resudf4;
						echo $REDIRECT;
					}
					else
					{
					/* NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE */
					/*Udf5 field values not matched with calculetd hashed valued then show appropriate message to
					Mercahnt for E.g.Hashing Response NOT Successful*/

					/* Hashing Response NOT Successful */
//					$REDIRECT = 'REDIRECT=http://www.merchantdemo.com/StatusTRAN.php?ResError=Hashing Response Mismatch';
					$REDIRECT = 'REDIRECT='.$HDFCPG['StatusTRANUrl'].'?ResError=Hashing Response Mismatch';
					echo $REDIRECT;														
					}
		}
		else 
		{
						/*ERROR IN TRANSACTION PROCESSING
						IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
						TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
						AND THEN REDIRECT CUSTOMER ON RESULT PAGE*/
//		$REDIRECT = 'REDIRECT=http://www.merchantdemo.com/StatusTRAN.php?ResResult='.$ResResult.'&ResTrackId='.$ResTrackID.'&ResAmount='.$ResAmount.'&ResPaymentId='.$ResPaymentId.'&ResRef='.$ResRef.'&ResTranId='.$ResTranId.'&ResError='.$ResErrorText;		
		$REDIRECT = 'REDIRECT='.$HDFCPG['StatusTRANUrl'].'?ResResult='.$ResResult.'&ResTrackId='.$ResTrackID.'&ResAmount='.$ResAmount.'&ResPaymentId='.$ResPaymentId.'&ResRef='.$ResRef.'&ResTranId='.$ResTranId.'&ResError='.$ResErrorText.'&EmailId='.$Resudf1.'&Name='.$Resudf2.'&Address='.$Resudf3.'&PhoneNo='.$Resudf4;		
		echo $REDIRECT;
		}
	}	
}
catch(Exception $e)
{
	var_dump($e->getMessage());
}
?>


