<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
        <link rel="stylesheet" href="css/colorbox.css" />
        <script src="js/jquery.colorbox.js"></script>
        <script>
            $(document).ready(function() {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
                $("#click").click(function() {
                    $('#click').css({"background-color": "#f00", "color": "#fff", "cursor": "inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
            });
        </script>
        <style>
            
        </style>
    </head>
    <body>
        <div id="Container">
            <!--wrapper start-->
            <div class="wrapper">
                <!--header start-->
                <?php
                include('header.php');
                $NewsData = sql_Query("SELECT * from newsevents order by id desc", $db);
                ?>
                <!--header end-->

                <!--content start-->
                <div id="Content">
                    <div class="content-wrapper">
                        <!--column2 start-->
                        <div class="column2">
                            <div class="column2-left">
                                <h2>News & Events</h2>
                                <?php while ($listNews = sql_Fetch($NewsData)) { ?>
                                    <div class="news1" style="margin-top:10px;">
                                        <div class="left_icon"><img src="images/eventicon.png" alt=""></div>
                                        <div class="text">
                                            <div>
                                                <h2><?php echo $listNews['title']; ?></h2>
                                                <p><?php echo substr ($listNews['description'],0,strpos($listNews['description'], '<br />'));?>...</p>
                                            </div>
                                            <p class="read_more"><a href="news.php">Read More</a></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="column2-right">
                                <h2>Welcome</h2>
                                <p><span>Fly-Hi Marine Travels</span> is one of the leading service travel management companies with excellent track record and consistent growth. Being honoured with IATA and ISO 9001: 2015 certifications, Fly-Hi professionally organizes and manages travel related information and services worldwide - 366 days 24/7 non stop.</p>

                                <p>Our credibility in providing on-time, differentiated and transparent services is undisputable. We are humbly labelled as amongst the top ten travel companies in the world in the areas of transparency and efficiency.
                                </p>

                                <p>Established in 2006, Fly-Hi has grown from strength to strength from a two member team to that of over 70 members. Starting from a humble beginning with 10 tickets a month we have grown exponentially to 10000 tickets a month.</p>
                                <p>Our clients have been with us for a long time. A common industry trend in the marine sector is jumping from one travel provider to another. But we have never lost a client due to that. We humbly announce that our first client since 2006 is still with us.</p>
                                <p>Transparency is the base of all our business decisions. While we offer our clients complete access to our systems by handing over the Amadeus system, we also educate them on the grey areas so that the transparency we offer is well understood.</p>

                            </div>
                        </div>
                        <!--column2 end-->
                    </div>
                </div>
                <!--content end-->
            </div>

            <!--wrapper end--> 


            <!--content_bottom start--> 
            <div id="Content_bottom">
                <div class="wrapper">
                    <div class="column3">
                        <h2><center>Useful Links</center></h2>
                        <!--gallery_box1 Start-->
                        <ul id="mycarousel" class="jcarousel-skin-tango clearfix">
                            <li>
                                <div class="image"><img src="images/image1.png" alt="" /></div>
                                <p>World Weather</p>
                                <a class='iframe' href="http://www.weather.com/common/welcomepage/world.html"><img src="images/more.png" alt="more"/></a>
                            </li>
                            <li>
                                <div class="image"><img src="images/image2.png" alt="" /></div>
                                <p>Destination Info</p>
                                <a class='iframe' href="http://www.frommers.com/destinations/"><img src="images/more.png" alt="more"/></a>
                            </li>
                            <li>
                                <div class="image"><img src="images/image3.png" alt="" /></div>
                                <p>Flight Information</p>
                                <a class='iframe' href="http://www.flightstats.com/go/FlightStatus/flightStatusByFlight.do"><img src="images/more.png" alt="more"/></a>
                            </li>
                            <li>
                                <div class="image"><img src="images/image4.png" alt="" /></div>
                                <p>Airport Guides</p>
                                <a class='iframe' href="http://www.flightstats.com/go/Airport/airportDetails.do"><img src="images/more.png" alt="more"/></a>
                            </li>
                            <li class="last">
                                <div class="image"><img src="images/image5.png" alt="" /></div>
                                <p>Travel News</p>
                                <a class='iframe' href="http://www.breakingtravelnews.com"><img src="images/more.png" alt="more"/></a>
                            </li>

                        </ul>
                        <!--gallery_box1 End--> 
                    </div>

                </div>
            </div>
            <!--content_bottom end--> 

            <!--footer start-->
            <?php include('footer.php'); ?>
            <!--footer end-->


        </div>
        <!--Scripts here...-->
        <!--<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>-->
        <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/skin.css" />
        <script type="text/javascript">
            function mycarousel_initCallback(carousel)
            {
                // Disable autoscrolling if the user clicks the prev or next button.
                carousel.buttonNext.bind('click', function() {
                    carousel.startAuto(0);
                });

                carousel.buttonPrev.bind('click', function() {
                    carousel.startAuto(0);
                });

                // Pause autoscrolling if the user moves with the cursor over the clip.
                carousel.clip.hover(function() {
                    carousel.stopAuto();
                }, function() {
                    carousel.startAuto();
                });
            }
            ;

            jQuery(document).ready(function() {
                jQuery('#mycarousel').jcarousel({
                    easing: 'linear',
                    animation: 1000,
                    scroll: 1,
                    auto: 2,
                    wrap: 'last',
                    initCallback: mycarousel_initCallback
                });
                jQuery('#mycarouse2').jcarousel({
                    easing: 'linear',
                    animation: 1000,
                    scroll: 1,
                    auto: 2,
                    wrap: 'last',
                    initCallback: mycarousel_initCallback
                });
                jQuery('#mycarouse3').jcarousel({
                    easing: 'linear',
                    animation: 1000,
                    scroll: 1,
                    auto: 2,
                    wrap: 'last',
                    initCallback: mycarousel_initCallback
                });
            });
        </script>
    </body>
</html>
