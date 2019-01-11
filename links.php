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
                            <h2><span>Useful links</span></h2>
                            <div class="links">
                                <ul>
                                    <li class="first">
                                        <div class="image1"><img src="images/image1.png" alt="world weather"/></div>
                                        <p>World Weather</p>
                                        <a class='iframe' href="http://www.weather.com/common/welcomepage/world.html"><img src="images/more.png" alt="more"/></a>
                                    </li>
                                    <li>
                                        <div class="image1"><img src="images/image2.png" alt="Destination Info"/></div>
                                        <p>Destination Info</p>
                                        <a class='iframe' href="http://www.frommers.com/destinations/"><img src="images/more.png" alt="more"/></a>
                                    </li>
                                    <li>
                                        <div class="image1"><img src="images/image3.png" alt="Flight Information"/></div>
                                        <p>Flight Information</p>
                                        <a class='iframe' href="http://www.flightstats.com/go/FlightStatus/flightStatusByFlight.do"><img src="images/more.png" alt="more"/></a>
                                    </li>
                                    <li>
                                        <div class="image1"><img src="images/image4.png" alt="Airport Guides"/></div>
                                        <p>Airport Guides</p>
                                        <a class='iframe' href="http://www.flightstats.com/go/Airport/airportDetails.do"><img src="images/more.png" alt="more"/></a>
                                    </li>
                                    <li>
                                        <div class="image1"><img src="images/image5.png" alt="Travel News"/></div>
                                        <p>Travel News</p>
                                        <a class='iframe' href="http://www.breakingtravelnews.com"><img src="images/more.png" alt="more"/></a>
                                    </li>
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
