<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('includes.php'); ?>
        <link href="css/smart_tab_vertical.css" rel="stylesheet" type="text/css"></link>
        <script type="text/javascript" src="js/jquery.smartTab.js"></script>
        <script type="text/javascript">

            $(document).ready(function() {

                $('#tabs').smartTab
                        ({
                            selected: 0,
                            saveState: false,
                            contentCache: false,
                            autoProgress: false,
                            stopOnFocus: true,
                            transitionEffect: 'vSlide'
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


                            <table align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td valign="top">
                                        <!-- Tabs -->
                                        <div id="tabs">
                                            <ul>
                                            <!-- <li><img src="images/features_icon.png" alt="objective"/><a href="#tabs-1">Our Features</a></li> -->
                                                <li style="margin-left:0px;"><img src="images/crew_icon.png" alt="crew"/><a href="#tabs-1"><span>Crew Travel Management</span></a></li>
                                                <li style="color: #CF1C22; font-size: 18px;font-weight: bold;margin:12px 0px 8px 0px;padding: 0 0 0 23px;width: 36%;">Our Features</li>
                                                <li><img src="images/tracking.png" alt="tracking"/><a href="#tabs-2">Travel Tracking</a></li>
                                                <li><img src="images/transparency_icon.png" alt="transparency"/><a href="#tabs-3">Transparency : Access To Amadeus/Galileo</a></li>
                                                <li style="margin-left:20px;"><img src="images/pricing.png" alt="pricing"/><a href="#tabs-4">Pricing</a></li>

                                                <li><img src="images/savings.png" alt="savings"/><a href="#tabs-5">Travel Budget Savings</a></li>
                                                <li><img src="images/report.png" alt="Customized reporting"/><a href="#tabs-6">Customized reporting</a></li>
                                                <li><img src="images/info_icon.png" alt="requirments"/><a href="#tabs-7">Visa requirements, health risks etc.</a></li>

                                            </ul>
                                            <!-- <div id="tabs-1" style="display:block;">
                                <h2>Our Features</h2>	
                                    <p>PAGE UNDER CONSTRUCTION</p>
                            </div> -->
                                            <div id="tabs-1" style="display:block;">
                                                <h2>CREW TRAVEL MANAGENEMENT</h2>	
                                                <p>We handle Crew logistics for a vast cross section of the industry. With help of negotiated fares and global partners, we can operate in and out of any country in the world at any time of day and night.</p>
                                                <p>This is a very specialised area of travel and in our experience, problems and delays can occur anytime mainly due to forces outside of our customers’ control, as the saying goes 'time and tide wait for no man'.</p>
                                                <p>We are open 24/7/366 days offering a continuous travel service for all our customers. We are able to assist with new air tickets, hotels, car hire as well as providing visa information and resolving travel issues on existing reservations.</p>
                                                <ul class="tabAnchor1">
                                                    <p>We Specialise in :</p>
                                                    <li>airline booking &amp; ticketing.</li>
                                                    <li>marine airfare.</li>
                                                    <li>maritime sector requirements.</li>
                                                    <li>maritime travel &amp; logistics.</li>
                                                    <li>itinerary optimisation.</li>
                                                    <li>>Visa requirements, health risks etc.</li>
                                                </ul>
                                            </div>

                                            <div id="tabs-2">
                                                <h2>Travel Tracking</h2>
                                                <p>When your reservation is confirmed, you will be provided with Viewtrip or CheckMyTrip reference number. You can then use the appropriate link to check your travel details.</p>
                                            </div>
                                            <div id="tabs-3">
                                                <h2>Transparency : Access To Amadeus/Galileo</h2>
                                                <p>When your reservation is confirmed you will be provided with a PNR reference number. With appropriate steps, one can check the fare details, baggage information and commissions. This gives 100 percent transparency.</p>
                                            </div>
                                            <div id="tabs-4">
                                                <h2>Pricing</h2>
                                                <p>We provide to our clients a detailed breakdown of all pricing elements on a pre-agreed basis – weekly / monthly / quarterly etc. There are no hidden charges and our transparency is absolute.</p>
                                                <p>The Management and Transaction fees can vary according to Client’s travel pattern. Volume discounts are always parted with the client.</p>	
                                            </div>

                                            <div id="tabs-5">
                                                <h2>Travel Budget Savings</h2>
                                                <p>We can help our clients achieve savings on their annual travel budget.</p>
                                                <p>Subject to agreed volumes, or volume shifts, significant savings can be made by our specialist Travel Consultants who analyse Client’s travel patterns and can suggest optimal crew changes thus minimising travel and associated overheads.</p>
                                            </div>
                                            <div id="tabs-6">
                                                <h2>Customized reporting</h2>
                                                <p>Besides Invoices and Statements we provide contractually committed Clients with customized MIS (Management Information System) reports.</p>	
                                            </div>
                                            <div id="tabs-7">
                                                <h2>Visa requirements, health risks etc.</h2>
                                                <p>Fly Hi consultants offer a full range of information about travel destinations and health risks likely to be encountered at specific destinations and associated with different types of travel. We provide appropriate advice, whether concerning recommended vaccinations, protection against insects and other disease factors, and safety in different environmental settings.</p>
                                            </div>





                                        </div>  	
                                    </td>
                                </tr>
                            </table>

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
