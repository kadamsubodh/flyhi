<?php

include 'config.inc.php';

/* Get HDFC Bank Parameters */
$HDFCPG = sql_Fetch(sql_Query("Select ResponseUrl,StatusTRANUrl,Tranportalid from hdfc_pg_detail", $db));

try {
    /* Capture the IP Address from where the response has been received */
    $strResponseIPAdd = getenv('REMOTE_ADDR');

    /* Check whether the IP Address from where response is received is PG IP */
    if ($strResponseIPAdd != "221.134.101.174" && $strResponseIPAdd != "221.134.101.169" && $strResponseIPAdd != "198.64.129.10" && $strResponseIPAdd != "198.64.133.213") {
        
        $UpdateTransaction = "UPDATE transactions SET tranId=" . $_POST['tranid'] . ",result='NOT CAPTURED' WHERE paymentId=" . $_POST['paymentid'];

        if(sql_Query($UpdateTransaction, $db)){
        
            $REDIRECT = 'REDIRECT=' . $HDFCPG['StatusTRANUrl'] . '?ResPaymentId=' . $_POST['paymentid'];
            echo $REDIRECT;
        }
    } else {

        $ResErrorText = isset($_POST['ErrorText']) ? $_POST['ErrorText'] : '';  //Error Text/message
        $ResPaymentId = isset($_POST['paymentid']) ? $_POST['paymentid'] : ''; //Payment Id
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


        if ($ResErrorNo == '') {

            $strHashTraportalID = trim($HDFCPG['Tranportalid']);
            
            $strhashstring = "";

            $strhashstring = trim($strHashTraportalID);

            //Below code creates the Hashing String also it will check NULL and Blank parmeters and exclude from the hashing string
            if ($ResTrackID != '' && $ResTrackID != null)
                $strhashstring = trim($strhashstring) . trim($ResTrackID);
            if ($ResAmount != '' && $ResAmount != null)
                $strhashstring = trim($strhashstring) . trim($ResAmount);
            if ($ResResult != '' && $ResResult != null)
                $strhashstring = trim($strhashstring) . trim($ResResult);
            if ($ResPaymentId != '' && $ResPaymentId != null)
                $strhashstring = trim($strhashstring) . trim($ResPaymentId);
            if ($ResRef != '' && $ResRef != null)
                $strhashstring = trim($strhashstring) . trim($ResRef);
            if ($ResAuth != '' && $ResAuth != null)
                $strhashstring = trim($strhashstring) . trim($ResAuth);
            if ($ResTranId != '' && $ResTranId != null)
                $strhashstring = trim($strhashstring) . trim($ResTranId);

            //Use sha256 method which is defined below for Hashing ,It will return Hashed valued of above strin					
            $hashvalue = hash('sha256', $strhashstring);

			echo "HASHING". $hashvalue;

            /*             * *****************HASHING CODE LOGIC END*********************************** */

            $txnResult = isset($ResResult) ? $ResResult : '';
            $txnTrackID = isset($ResTrackID) ? $ResTrackID : '';
            $txnPaymentID = isset($ResPaymentId) ? $ResPaymentId : '';
            $txnRef = isset($ResRef) ? $ResRef : '';
            $txnTranID = isset($ResTranId) ? $ResTranId : '';
            $txnAmount = isset($ResAmount) ? $ResAmount : '';
            $txnError = isset($ResErrorText) ? $ResErrorText : '';
	
			if(isset($txnRef) && isset($txnTranID) && $txnTranID != "" && $txnRef != ""){

				$UpdateTransaction = "UPDATE transactions SET ref=" . $txnRef . ",tranId=" . $txnTranID . ",status='" . $txnError . "',tranDate='" . date('Y-m-d H:i:s') . "' WHERE paymentId=" . $ResPaymentId;

				$InsertTransaction = sql_Query($UpdateTransaction, $db);

				if ($hashvalue == $Resudf5) {

					/* Update Transaction Details into Database if Transaction is captured or successful */
					$Update = "UPDATE transactions SET amount=".$ResAmount.",result='CAPTURED' WHERE paymentId=" . $ResPaymentId;

					if (sql_Query($Update, $db)) {
						$REDIRECT = 'REDIRECT=' . $HDFCPG['StatusTRANUrl'] . '?ResPaymentId=' . $ResPaymentId;
						echo $REDIRECT;
					}
				} else {

					/* Update Transaction Details into Database if Transaction has Hashing MisMatch error */
					$Update = "UPDATE transactions SET result='NOT CAPTURED' WHERE paymentId=" . $ResPaymentId;

					if (sql_Query($Update, $db)) {

						$REDIRECT = 'REDIRECT=' . $HDFCPG['StatusTRANUrl'] . '?ResPaymentId=' . $ResPaymentId;
						echo $REDIRECT;
					}
				}
			}else{
			
				$UpdateTransaction = "UPDATE transactions SET result='NOT CAPTURED' WHERE paymentId=" . $ResPaymentId;

				$InsertTransaction = sql_Query($UpdateTransaction, $db);

				$REDIRECT = 'REDIRECT=' . $HDFCPG['StatusTRANUrl'] . '?ResPaymentId=' . $ResPaymentId;
                echo $REDIRECT;
			}
        } else {

            /* Update Transaction Details into Database if Transaction is not captured or failed */
            $Update = "UPDATE transactions SET result='NOT CAPTURED' WHERE paymentId=" . $ResPaymentId;

            if (sql_Query($Update, $db)) {

                $REDIRECT = 'REDIRECT=' . $HDFCPG['StatusTRANUrl'] . '?ResPaymentId=' . $ResPaymentId;
                echo $REDIRECT;
            }
        }
    }
} catch (Exception $e) {
    var_dump($e->getMessage());
}
?>