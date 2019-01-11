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
                <?php
                $query = sql_Query("SELECT * from newsevents order by id desc", $db);
                ?>
                <div id="Content">
                    <div class="content-wrapper">
                        <!--column2 start-->
                        <div class="column2">

                            <div class="column2-left-image">
                                <img src="images/news.png" alt="news"/>
                            </div>

                            <div class="column2-right-inner-news">
                                <h2><span>News &amp; events</span></h2>	
                                <ul>
                                    <?php while ($row = sql_Fetch($query)) { ?>

                                          
                                        <li>
                                            <div class="newsevents">
                                            <h5><?php echo $row['title']; ?></h5>
                                            <span class="PostedOn">Posted On : <?php echo date('M dS,Y',  strtotime($row['createdOn'])); ?></span>
                                            
                                            </div>
                                            <div>
                                            <?php echo $row['description']; ?>
                                                </div>
                                        </li>

                                    <?php } ?>
                                </ul>
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
