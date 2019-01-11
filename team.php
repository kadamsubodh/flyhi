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

                            <div class="column2-left-image">
                                <img src="images/team.png" alt="team"/>
                            </div>




                            <div class="column2-right-accordion">
                                <h2><span>Our Team</span></h2>
                                <div class="grid_3">
                                    <div id="Accordion1" class="Accordion" tabindex="0">
                                        <div class="AccordionPanel">
                                            <div class="AccordionPanelTab"><h5>Mr abc</h5></div>
                                            <div class="AccordionPanelContent">
                                                <img src="images/male.png" alt="male"/>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            </div>
                                        </div>
                                        <div class="AccordionPanel">
                                            <div class="AccordionPanelTab"><h5>Mr xyz</h5></div>
                                            <div class="AccordionPanelContent">
                                                <img src="images/male.png" alt="male"/>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            </div>
                                        </div>
                                        <div class="AccordionPanel">
                                            <div class="AccordionPanelTab"><h5>Mrs Lorem</h5></div>
                                            <div class="AccordionPanelContent">
                                                <img src="images/female.png" alt="female"/>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            </div>
                                        </div>
                                        <div class="AccordionPanel">
                                            <div class="AccordionPanelTab"><h5>Mr Ipsum</h5></div>
                                            <div class="AccordionPanelContent">
                                                <img src="images/male.png" alt="male"/>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            </div>
                                        </div>
                                        <div class="AccordionPanel">
                                            <div class="AccordionPanelTab"><h5>Mrs wxy</h5></div>
                                            <div class="AccordionPanelContent">
                                                <img src="images/female.png" alt="female"/>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            </div>
                                        </div>



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
        <script type="text/javascript">
            var Accordion1 = new Spry.Widget.Accordion("Accordion1");
        </script>
    </body>
</html>
