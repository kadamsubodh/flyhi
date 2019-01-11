<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
        <script type="text/javascript" >
            
            $(document).ready(function(){
                
                $("#jobfrm").validationEngine();
                
            });
            
        </script>
    </head>
    <body>
        <div id="Container">
            <!--wrapper start-->
            <div class="wrapper">
                <!--header start-->
<?php include('header.php'); ?>
                <!--header end-->

                <?php
                $query = sql_Query("SELECT * FROM jobOpportunities WHERE id=".$_GET["jobId"], $db);
                $row = sql_Fetch($query);
                ?>
                <!--content start-->
                <div id="Content">
                    <div class="content-wrapper">
                        <!--column2 start-->
                        <div class="column2">
                            <h2><span>Job Opportunities</span></h2>
                            <p>If you have experience in the marine or business travel industry, please feel free to forward your CV to <a href="mailto:hr@fly-hi.in">hr@fly-hi.in</a> and we will contact you, if we have a suitable vacancy.</p>

                            <div class="careers-form">
                                <form method="post" id="jobfrm" action="job.php" enctype="multipart/form-data">
                                    <h4>Applying For : <p><?php echo isset($row['title']) ? $row['title'] : "" ; ?></p></h4>
                                    <div class="text_right1"><font style="font-size:18px;color:#FF0000;">*</font>Required information</div>
                                    <div class="info1">
                                        <label for="contactname" class="inputlabel1">
                                            Full Name
                                            <div class="dot3">:</div>
                                            <div class="mandatory">*</div>
                                        </label>
                                        <input type="text" class="validate[required]" name="contactname" size="40" id="contactname">
                                        <input type="hidden" name="jobid" size="40" id="jobid" value="<?php echo isset($row['id']) ? $row['id'] : "" ; ?>">
                                    </div>
                                    <div class="info1">
                                        <label for="email-address" class="inputlabel1">
                                            Email Address
                                            <div class="dot3">:</div>
                                            <div class="mandatory">*</div>
                                        </label>
                                        <input type="text" name="email" class="validate[required,custom[email]]" size="40" id="email-address">
                                    </div>
                                    <br class="clear">
                                    <div class="info1">
                                        <label for="Contact-no" class="inputlabel1">
                                            Contact No
                                            <div class="dot3">:</div>
                                            <div class="mandatory">*</div>
                                        </label>
                                        <input type="text" name="contact" class="validate[required]" size="40" id="Contact-no">
                                    </div>
                                    <br class="clear">
                                    <div class="info1">
                                        <label for="enquiry" class="inputlabel1">
                                            Address
                                            <div class="dot3">:</div>
                                            <div class="mandatory">*</div>
                                        </label>
                                        <textarea class="validate[required]" style="width:55%;" name="enquiry" cols="20" rows="7" id="enquiry"></textarea>
                                    </div>
                                    <br class="clear">
                                    <div class="info1">
                                        <label for="feedback" class="inputlabel1">
                                            Upload your CV
                                            <div class="dot3">:</div>
                                            <div class="mandatory">*</div>
                                        </label>
                                        <!--<input type="file" value="Browse ..." name="upload" class="browser">-->
                                        <div class="browse">
                                            <input type="file" class="validate[required]" style="display: none;" name="selectedFile" id="selectedFile">
                                            <input type="button" onclick="document.getElementById('selectedFile').click();" value="Browse...">
                                        </div>
                                    </div>
                                    <div class="info1"> <span>
                                            <input type="submit" value="SUBMIT" name="btnSubmit" class="careersubmit">
                                        </span> </div>
                                </form>
                            </div>	
                            <div class="career-image">	
                                <img src="images/job.png" alt="job"/>
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