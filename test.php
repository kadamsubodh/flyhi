<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.confirm.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/run_prettify.js"></script>
        <script type="text/javascript" >

            function getFromData() {
                var data = $("#Pay").serializeArray();
                
                $('#client_name strong').text(data[0]['value'] + " " + data[1]['value']);
                
                $('#cli_address1').text(data[3]['value']);
                
                $('#cli_address2').text(data[4]['value'] + " " + data[5]['value']);
                
                $('#cli_town').text(data[6]['value']);
                
                $('#cli_region').text(data[7]['value']);
                
                $('#cli_zipcode').text(data[8]['value']);
                
                $('#Invoicedesc').text(data[11]['value']);
                
                $('#final_amount').text("Rs." + data[12]['value']);

                console.log(data);
                return $('#invoice').html();
            }

            var stt = false;

            $(document).ready(function() {
                $("#Pay").validationEngine('attach');
                $('#pqr').click(function() {

                    if ($("#Pay").validationEngine('validate'))
                    {
                        $.confirm({
                            text: getFromData(),
                            confirm: function(button) {

                                console.log("form submit");
                                $('#Pay').submit();
                            },
                            cancel: function(button) {
                                console.log("form cacel");
                                return false;
                            }
                        });
                    }

                });
            });

        </script>
        <style type="text/css">
            
            #invoice{
                display: none;
            }
        </style>
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
                                <?php
                                if (isset($_GET['tranId']) && $_GET['tranId'] != "") {

                                    $getData = "SELECT * from transactions WHERE tranId = '" . $_GET['tranId'] . "'";
                                } else {
                                    $getData = "SELECT * from transactions WHERE paymentId = '" . $_GET['paymentId'] . "'";
                                }

                                $query = sql_Query($getData, $db);

                                $Data = sql_Fetch($query);

                                if (sql_NumRows($query) > 0) {

                                    $message = $Data['status'];

                                    if (isset($Data['status']) && $Data['status'] == "CAPTURED") {
                                        $state = "Successfull";
                                    } else {
                                        $state = "Unsuccessfull";
                                    }

                                    $msg = "<center>
										<p style='color:blue'>
											<b>Transaction " . $state . "</b>
										</p>
										<p style='color:blue'>
											<b>Transaction Message : " . $message . "</b>
										</p>
										<p style='color:blue'>
											<b>Mail have been send to " . $Data['email'] . "</b>
										</p>
										</center>";
                                }

                                if (isset($_GET['tranId']) && $_GET['tranId'] != "" || isset($_GET['paymentId']) && $_GET['paymentId'] != "") {
                                    echo $msg;
                                }
                                ?>
                                <h4>Pay Online</h4>
                                <div style="padding: 5px 15px;;"> 

                                    <form id="Pay" action="#" method="post">

                                        <div class="info">
                                            <label for="txtFirstName" class="inputlabel">First Name
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtFirstName" id="txtFirstName" class="validate[required]" maxlength="100" >
                                        </div>

                                        <div class="info">
                                            <label for="txtLastName" class="inputlabel">Last Name
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtLastName" class="validate[required]" id="txtLastName" maxlength="100" >
                                        </div>

                                        <div class="info">
                                            <label for="txtEmail" class="inputlabel">Email
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="email" class="validate[required,custom[email]]" id="email" maxlength="100" >
                                        </div>

                                        <div class="info">
                                            <label for="txtAddLine1" class="inputlabel">Address Line 1
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtAddLine1" class="validate[required]" id="txtAddLine1" maxlength="200" >
                                        </div>

                                        <div class="info">
                                            <label for="txtAddLine2" class="inputlabel">Address Line 2 (Optional)
                                                <div class="dot3">:</div>
                                            </label>
                                            <input type="text" name="txtAddLine2" id="txtAddLine2" maxlength="200" >
                                        </div>

                                        <div class="info">
                                            <label for="txtLandmark" class="inputlabel">Landmark (Optional)
                                                <div class="dot3">:</div>
                                            </label>
                                            <input type="text" name="txtLandmark" id="txtLandmark" maxlength="150" >
                                        </div>

                                        <div class="info">
                                            <label for="txtCity" class="inputlabel">City
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtCity" class="validate[required]" id="txtCity" maxlength="150" >
                                        </div>

                                        <div class="info">
                                            <label for="txtState" class="inputlabel">State
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtState" class="validate[required]" id="txtState" maxlength="150" >
                                        </div>

                                        <div class="info">
                                            <label for="txtPincode" class="inputlabel">Pincode
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtPincode" class="validate[required]" id="txtPincode" maxlength="6" >
                                        </div>

                                        <div class="info">
                                            <label for="txtCountry" class="inputlabel">Country
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtCountry" class="validate[required]" id="txtCountry" maxlength="150" >
                                        </div>

                                        <div class="info">
                                            <label for="txtMobile" class="inputlabel">Mobile No.
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtMobile" class="validate[required]" id="txtMobile" maxlength="12" >
                                        </div>

                                        <div class="info">
                                            <label for="txtDescription" class="inputlabel">Payment Description
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <textarea name="txtDescription" class="validate[required]" id="txtDescription" ></textarea>
                                        </div>

                                        <div class="info">
                                            <label for="txtPrice" class="inputlabel">Total Price
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="txtPrice" class="validate[required]" id="txtPrice" maxlength="100" >
                                        </div>

                                        <div class="info">
                                            <span>
                                                <input type="button" class="careersubmit" name="btnConfirm" id="pqr" value="Proceed" />
                                            </span>
                                        </div>

                                    </form>
                                </div>

                            </div>	

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--content end-->
        <!--footer start-->
        <div id="Footer">
            <div class="wrapper">
                <div class="link">
                    <ul>
                        <li><a href="index.html">Home  </a></li>
                        <li><a href="about.html" >About us</a></li>
                        <li><a href="vision_mission.html">Vision &amp; Mission</a></li>
                        <li><a href="value.html"><span>Values</span></a></li>
                        <li><a href="crew.html">Services </a></li>
                        <li><a href="why_us.html">Believe in us</a></li>
                        <li><a href="partner.html">Partner with us </a></li>
                        <li><a href="contact.html" class="last active">Contact Us</a></li>
                    </ul>
                    <p>&copy; Copyrights 2014 FLY HI Travels. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!--footer end-->

    </div>
    
    <style>
    .bold {
        font-weight: bold;
    }
</style>

<div class="row-fluid" id="invoice">
    <div class="row">
        <div style="font-size:17pt;border-bottom:4px solid black;color:orange;">Payment Details</div>
    </div>
    
    <div class="row">
        <div style="padding:5px;padding-bottom:0px;border-bottom:1px solid orange;"><?php echo date('d F Y'); ?></div>
    </div>
    
    <div class="row bold" style="padding:5px;border-bottom:1px solid grey;">ONLINE PAYMENT</div>
    <br />
    
    <div class="row">
        <div class="col-lg-6 pull-left">
            <p id="company_name"><strong>Fly Hi Travels</strong></p>
            <p id="comp_address1">310, Shalimar Morya Park,</p>
            <p id="comp_address2">Opposite Infiniti Mall,</p>
            <p id="comp_town">Andheri West</p>
            <p id="comp_region">Maharashtra</p>
            <p id="comp_zipcode">400053</p>
        </div>
        
        <div class="col-lg-4 pull-right">
            <p id="client_name"><strong></strong></p>
            <p id="cli_address1"></p>
            <p id="cli_address2"></p>
            <p id="cli_town"></p>
            <p id="cli_region"></p>
            <p id="cli_zipcode"></p>
        </div>
    </div>
    
    <br />
    
    <div class="row">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <th width="55%">Description</th>
                    <th width="10%" style="text-align:right;">Amount</th>
                </tr>
                <tr>
                    <td id="Invoicedesc"></td>
                    <td id="final_amount" style="text-align:right;"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
</body>
</html>