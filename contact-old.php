<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
        <script type="text/javascript" >
            
            $(document).ready(function(){
                
                $("#enquiryfrm").validationEngine();
                
            });
            
        </script>
        <style type="text/css">
            .formError{ left: 714px !important; }
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

                            <div class="column2-left">
                                <div class="contact-details">
                                    <h2><span>Contact Us</span></h2>
                                    <p style="margin-bottom:0px;"><span>We are reachable <font style="color:#0A4E9B;">24 * 7</font> at the following Address</span></p>
                                    <div class="contact">

                                        <p><img alt="address" src="images/address.png">Office</p>
                                        <div class="dot">:</div>
                                        <div class="address"><font style="color:#0A4E9B;">Fly Hi Travels</font><br/>
                                            310, Shalimar Morya Park,<br>
                                            Opposite Infiniti Mall,<br>
                                            Off New Link Road,<br>
                                            Andheri West - 400 053<br>
                                            Maharashtra</div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="contact" src="images/phone_small.png">Phone</p>
                                        <div class="dot">:</div>
                                        <div class="address">+91-22-4065 7600</div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="email" src="images/fax.png">Fax</p>
                                        <div class="dot">:</div>
                                        <div class="address">+91-22-2673 5094</div>
                                    </div>

                                    <div class="contact">
                                        <p><img alt="email" src="images/contact_small.png">E-mail</p>
                                        <div class="dot">:</div>
                                        <div class="address"><a href="mailto:travel@fly-hi.in">travel@fly-hi.in</a> </div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="email" src="images/skype.png">Skype Id</p>
                                        <div class="dot">:</div>
                                        <div class="address">fly.hi.travels</div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="address" src="images/address.png">Office</p>
                                        <div class="dot">:</div>
                                        <div class="address"><font style="color:#0A4E9B;">New Delhi Office</font><br/>232 - B, 1<sup>st</sup> floor,<br>
                                            Okhla Phase - III,<br>
                                            New Delhi – 110 020</div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="contact" src="images/phone_small.png">Phone</p>
                                        <div class="dot">:</div>
                                        <div class="address">+91 -11- 4306 0604</div>
                                    </div>
									
									<div class="contact">
                                        <p><img alt="address" src="images/address.png">Office</p>
                                        <div class="dot">:</div>
                                        <div class="address"><font style="color:#0A4E9B;">Singapore Office</font>
										<br/>Fly Hi Travels Pte. Ltd.<br/>
										7500A Beach Road,<br/>
										#07-312, The Plaza,<br/>
                                        Singapore - 199591</div>
                                    </div>
                                    <div class="contact">
                                        <p><img alt="contact" src="images/phone_small.png">Phone</p>
                                        <div class="dot">:</div>
                                        <div class="address">+65 62970375</div>
                                    </div>



                                </div>
                            </div>


                            <div class="enquiryform"><!-- contactform --> 

                                <h4>Enquiry Form :</h4>
                                <div style="padding: 5px 15px;;"> 

                                    <form id="enquiryfrm" style="margin:30px 0px;">
                                        <div class="info">
                                            <label for="contactname" class="inputlabel">
                                                Full Name
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="contactname" class="validate[required]" size="40" id="contactname">
                                        </div>
                                        <div class="info">
                                            <label for="email-address" class="inputlabel">
                                                Email Address
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="email" class="validate[required,custom[email]]" size="40" id="email-address">
                                        </div>
                                        <br class="clear">
                                        <div class="info">
                                            <label for="Contact-no" class="inputlabel">
                                                Contact No
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <input type="text" name="contact" class="validate[required]" size="40" id="Contact-no">
                                        </div>
                                        <br class="clear">
                                        <div class="info">
                                            <label for="enquiry" class="inputlabel">
                                                Enquiry
                                                <div class="dot3">:</div>
                                                <div class="mandatory">*</div>
                                            </label>
                                            <textarea name="enquiry" class="validate[required]" cols="20" rows="7" id="enquiry"></textarea>
                                        </div>
                                        <br class="clear">
                                        <div class="info"> <span>
                                                <input type="submit" value="SUBMIT" name="btnSubmit" class="careersubmit">
                                            </span> </div>
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
        <?php include('footer.php'); ?>
        <!--footer end-->


    </div>
</body>
</html>
