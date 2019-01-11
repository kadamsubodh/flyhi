<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
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
                            
                             <?php
                            
                            $query = sql_Query("SELECT * from jobOpportunities order by id desc", $db);
                            
                            if (isset($_POST['btnSubmit']) && $_POST['btnSubmit'] == 'SUBMIT') {

                                $allowedExts = array(
                                    "pdf",
                                    "doc",
                                    "docx"
                                );

                                $allowedMimeTypes = array(
                                    'application/msword',
                                    'text/pdf'
                                );

                                if (isset($_FILES["selectedFile"]["name"]) && $_FILES["selectedFile"]["name"] != "")
                                    $extarr = explode(".", $_FILES["selectedFile"]["name"]);
                                $extension = end($extarr);

                                if (100000 < $_FILES["selectedFile"]["size"]) {
                                    echo('<span style="color:red">Please provide a smaller file.</span><br>');
                                }

                                if (!( in_array($extension, $allowedExts) )) {
                                    echo('<span style="color:red">Please provide file type as "pdf" or "doc".</span><br>');
                                }

                                if (!in_array($_FILES["selectedFile"]["type"], $allowedMimeTypes)) {
                                    echo('<span style="color:red">Please provide mime type as "application/msword" or "text/pdf" .</span><br>');
                                } else {
                                    $fileName = getcwd() . "/CVs/" . $_FILES["selectedFile"]["name"];
                                    move_uploaded_file($_FILES["selectedFile"]["tmp_name"], $fileName);

                                    $Insertquery = "insert into contactCV values('','" . $_POST['contactname'] . "','" . $_POST['email'] . "','" . $_POST['contact'] . "','" . $_POST['enquiry'] . "','" . $_FILES['selectedFile']['name'] . "',".$_POST['jobid'].",'" . date('Y-m-d') . "','1')";

                                    if (sql_Query($Insertquery, $db)) {
                                        echo "<p class='success'><span style='background-color:#0A4E9B;'>CV Uploaded Successfully<span class='close'>x</span></span></p>";
                                    }
                                }
                            }
                            ?>
                            
                            <h2><span>Job Opportunities</span></h2>
                            <p>If you have experience in the marine or business travel industry, please feel free to forward your CV to <a href="mailto:hr@fly-hi.in">hr@fly-hi.in</a> and we will contact you, if we have a suitable vacancy.</p>
                            
                            <?php if(sql_NumRows($query) > 0){ ?>
                            
                            <h4><span>Current Openings</span></h4>
                            
                            <?php while ($row = sql_Fetch($query)) { ?>

                                <div class="careers">

                                    <div class="opening">

                                        <div class="title">
                                            <strong>Position : </strong><?php echo isset($row['title']) ? $row['title'] : "" ?>
                                        </div>

                                        <div class="Experience">
                                            <strong>Experience : </strong><?php echo isset($row['experience']) ? $row['experience'] : "" ?>
                                        </div>

                                        <div class="profile">
                                            <strong>Profile : </strong>
                                            <?php echo isset($row['description']) ? $row['description'] : "" ?>
                                        </div>

                                    </div>
                                    <div>
                                        <button class="apply" id="apply_<?php echo isset($row['id']) ? $row['id'] : "" ?>">Apply Now</button>
                                        <span class="PostedOn">
                                            <strong>Posted On : </strong>
                                            <?php echo isset($row['createdOn']) ? date('M dS,Y',  strtotime($row['createdOn'])) : "" ?>
                                        </span>
                                    </div>
                                </div>

                            <?php } } ?>
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
    <script type="text/javascript">
        $('.apply').click(function() {
            var job_id = $(this).attr('id').split("_");
            window.location.href = "apply.php?jobId=" + job_id[1];
        });
        
        $('span.close').click(function() {
            $(".success").fadeOut(1000,function(){
                $('.success').css('display','none');
            });
        });
        
    </script>
</html>