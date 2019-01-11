<?php
include 'config.inc.php';
?>
<div id="Header">
    <div class="header-top">
        <div class="logo"><a href="index.php"><img src="images/logo.png" alt="LY HI"/></a></div>
        <div class="header-right">
            <ul>
                <li><a href="news.php"> News &amp; Events</a></li>
                <li><a href="links.php">Useful Links</a></li>
                <li><a href="job.php">Job opportunities</a></li>
                <li><a href="PayOnline.php" class="last" style="color:#0A4E9B;font-weight:bold;">Pay 0nline</a></li>

            </ul>
            <div id='cssmenu'>

                <ul>
                    <li><a href='index.php'><span>Home</span></a></li>
                    <li><a href="about.php"><span>About Us</span></a></li>
                    <li><a href="vision_mission.php"><span>Vision &amp; Mission</span></a></li>
                    <li><a href="value.php"><span>Values</span></a></li>
                    <li class='has-sub'><a href="crew.php"><span>Services</span></a>
                        <ul>
                            <li class='has-sub'><a href='crew.php'><span>Crew Travel Management</span></a> </li>
                            <li class='has-sub'><a href='corporate.php'><span>Corporate travel Management</span></a> </li>
                            <li class='has-sub'><a href='advertising.php'><span>Advertising</span></a> </li>
                            <li class='has-sub'><a href='event.php'><span>Event Management</span></a> </li>
                            <li class='has-sub'><a href='social.php' class="last"><span>Social and Digital Marketing Solution</span></a> </li>
                        </ul>
                    </li>
                    <li><a href='why_us.php'><span>Believe in Us</span></a></li>
                    <li><a href='partner.php'><span>Partner with Us </span></a></li>
                    <li><a href="joc.php">JOC</a></li>
                   <!-- <li><a href="gallery.php">Gallery</a></li>-->
                    <li class="last"><a href='contact.php' class="last"><span>Contact Us</span></a>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--banner start-->
<div class="banner">
    <div id="sliderContainer" style="max-width:100%;">
        <div id="mySlides">
            <div id="slide1" class="slide" style="max-width:100%;"> <img src="images/bannerimg1.jpg" alt="Slide 1" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
            <div id="slide2" class="slide" style="max-width:100%;"> <img src="images/bannerimg2.jpg" alt="Slide 2" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
            <div id="slide3" class="slide" style="max-width:100%;"> <img src="images/bannerimg3.jpg" alt="Slide 3" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
            <div id="slide4" class="slide" style="max-width:100%;"> <img src="images/bannerimg4.jpg" alt="Slide 4" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
            <div id="slide5" class="slide" style="max-width:100%;"> <img src="images/bannerimg5.jpg" alt="Slide 5" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
            <div id="slide6" class="slide" style="max-width:100%;"> <img src="images/bannerimg6.jpg" alt="Slide 6" />
                <div class="slideContent"> 
                    <!--<h3></h3>--> 
                </div>
            </div>
        </div>

        <div id="myController"> <span class="jFlowControl"></span> <span class="jFlowControl"></span> <span class="jFlowControl"></span> <span class="jFlowControl"></span> <span class="jFlowControl"></span><span class="jFlowControl"></span>
            <div class="jFlowPrev"></div>
            <div class="jFlowNext"></div>
        </div>
    </div>
</div>
<!--banner end-->

<script type="text/javascript">

$(document).ready(function(){
    $("#cssmenu ul li a[href*='"+window.location.pathname.split('/').pop()+"']").parent().addClass('active');

    $("#cssmenu ul li ul li a[href*='"+window.location.pathname.split('/').pop()+"']").parent().parent().parent().addClass('active'); 
    
    if( window.location.pathname.split('/').pop() == "" ){
        $("#cssmenu ul li").first().addClass("active");
    }
});

</script>