<?php


session_start();
if($_POST['bank'] == 'hdfc')
{
    echo "hdfc";
    exit;
    $HASHING_METHOD = 'sha512'; // md5,sha1
    $ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

    // This post.php used to calculate hash value using md5 and redirect to payment page.
    if(isset($_POST['secretkey']))
        $_SESSION['SECRET_KEY'] = $_POST['secretkey'];
    else
        $_SESSION['SECRET_KEY'] = ''; //set your secretkey here

    $hashData = $_SESSION['SECRET_KEY'];

    $_POST['name'] = $_POST['txtFirstName']." ".$_POST['txtLastName'];
    unset($_POST['txtFirstName']);
    unset($_POST['txtLastName']);
    unset($_POST['secretkey']);
    unset($_POST['Proceed']);

    /**** Added By Pranali Start ***/

    $postData = $_POST;
    echo '<pre>'; print_r($postData) ; exit;
    /**** Added By Pranali End ****/

    ksort($postData);
    foreach ($postData as $key => $value){
        if (strlen($value) > 0) {
            $hashData .= '|'.$value;
        }
    }


    if (strlen($hashData) > 0) {
        $secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
    }
    //echo $secureHash; exit;
    ?>
    <html>
    <!--onLoad="document.payment.submit();" -->
    <body>
    <h3>Please wait, redirecting to process payment..</h3>

    <?php //echo "<pre>"; print_r($_POST); exit; ?>
    <form action="<?php echo $ACTION_URL?>" name="payment" method="POST">
        <?php
        foreach($_POST as $key => $value) {
    //echo $key ." => ". $value."<br>";
            ?>
            <input type="hidden" value="<?php echo $value;?>" name="<?php echo $key;?>"/>
            <?php
        }
        ?>
        <input type="hidden" value="<?php echo $secureHash; ?>" name="secure_hash"/>
    </form>
    </body>
    </html>
<?php
    }
    else
    {
?>
    <html>
<head>
<!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
<script src="https://gateway-japa.americanexpress.com/form/version/50/merchant/test8110291580/session.js"></script>
 <?php include('includes.php'); ?>
<!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
<style id="antiClickjack">body{display:none !important;}</style>
</head>
<body>
<div id="Container">
    <!--wrapper start-->
    <div class="wrapper">
        <!--header start-->
        <?php include('header.php'); ?>
        <!--header end-->

        <!--content start-->
        <div id="Content">
            <div class="content-wrapper">
            <!--column2 start-->
                <div class="column2">

                    <div class="enquiryform">
                         <h4>Please enter your payment details:</h4>
                        <div style="padding: 5px 15px;;"> 

                        <!-- CREATE THE HTML FOR THE PAYMENT PAGE -->                          
                            <form name='americanexpressform' action='americanExpressPayment.php' method="POST">
                                Card Number:<br>
                                <input type="text" id="card-number" name='card-number' class="input-field" value="345678901234564"><br>
                                Expiry Month:<br>
                                <input type="text" id="expiry-month" name='expiry-month' class="input-field" value=""><br>
                                Expiry Year:<br>
                                <input type="text" id="expiry-year" name='expiry-year' class="input-field" value=""><br>
                                Security Code:<br>
                                <input type="text" id="security-code" name='security-code' class="input-field" value=""><br>
                                 <input type="hidden" name="amount" value="<?php echo $_POST['amount'];?>" id="amount">
                                 <input type="hidden" name="currency" value="<?php echo $_POST['currency'];?>" id="amount">
                                <button id="payButton" type="submit">Pay Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT FRAME-BREAKER CODE TO PROVIDE PROTECTION AGAINST IFRAME CLICK-JACKING -->
<script type="text/javascript">
if (self === top) {
    var antiClickjack = document.getElementById("antiClickjack");
    antiClickjack.parentNode.removeChild(antiClickjack);
} else {
    top.location = self.location;
}

PaymentSession.configure({
    fields: {
        // ATTACH HOSTED FIELDS TO YOUR PAYMENT PAGE FOR A CREDIT CARD
        card: {
            number: "#card-number",
            securityCode: "#security-code",
            expiryMonth: "#expiry-month",
            expiryYear: "#expiry-year"
        }
    },
    //SPECIFY YOUR MITIGATION OPTION HERE
    frameEmbeddingMitigation: ["javascript"],
    callbacks: {
        initialized: function(response) {
            // HANDLE INITIALIZATION RESPONSE
        },
        formSessionUpdate: function(response) {
            // HANDLE RESPONSE FOR UPDATE SESSION
            if (response.status) {
                if ("ok" == response.status) {
                    console.log("Session updated with data: " + response.session.id);
  
                    //check if the security code was provided by the user
                    if (response.sourceOfFunds.provided.card.securityCode) {
                        console.log("Security code was provided.");
                    }
  
                    //check if the user entered a Mastercard credit card
                    if (response.sourceOfFunds.provided.card.scheme == 'MASTERCARD') {
                        console.log("The user entered a Mastercard credit card.")
                    }
                } else if ("fields_in_error" == response.status)  {
  
                    console.log("Session update failed with field errors.");
                    if (response.errors.cardNumber) {
                        console.log("Card number invalid or missing.");
                    }
                    if (response.errors.expiryYear) {
                        console.log("Expiry year invalid or missing.");
                    }
                    if (response.errors.expiryMonth) {
                        console.log("Expiry month invalid or missing.");
                    }
                    if (response.errors.securityCode) {
                        console.log("Security code invalid.");
                    }
                } else if ("request_timeout" == response.status)  {
                    console.log("Session update failed with request timeout: " + response.errors.message);
                } else if ("system_error" == response.status)  {
                    console.log("Session update failed with system error: " + response.errors.message);
                }
            } else {
                console.log("Session update failed: " + response);
            }
        }
      }
  });

function pay() {
    // UPDATE THE SESSION WITH THE INPUT FROM HOSTED FIELDS
    PaymentSession.updateSessionFromForm('card');
}
</script>
</body>
</html>
<?php
    exit;
    }
?>
