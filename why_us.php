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
                                                <li><img src="images/why_us_icon.png" alt="why us" /><a href="#tabs-1"><span>Why Us</span></a></li>
                                                <li><img src="images/transparency_icon.png" alt="transparency"/><a href="#tabs-2">Transparency </a></li>
                                                <li><img src="images/reliability_icon.png" alt="relilability"/><a href="#tabs-3">Reliability</a></li>
                                                <li><img src="images/bandwidth_icon.png" alt="dedictaed bandwidth"/><a href="#tabs-4">Dedicated Bandwidth</a></li>

                                                <li><img src="images/solution_icon.png" alt="solutions"/><a href="#tabs-5">Customized Solution</a></li>
                                                <li><img src="images/connect_icon.png" alt="human connect"/><a href="#tabs-6">Bring in human connect</a></li>
                                                <li><img src="images/fares.png" alt="fares"/><a href="#tabs-7">Local Purchased Global Fares</a></li>
                                                <li><img src="images/free_icon.png" alt="free trial"/><a href="#tabs-8">Free trial quotes</a></li>
                                                <li><img src="images/clock_icon.png" alt="24/7/366 non-stop global support"/><a href="#tabs-9">24/7/366 non-stop global support services</a></li>
                                            </ul>
                                            <div id="tabs-1">
                                                <h2>Why Us</h2>	
                                                <p>With unique business model providing mix of lowest charges, best routing, total non-stop 366 days support , humble attitude at every level of hierarchy, transparency and professionalism, the objective of Fly Hi is 100% customer satisfaction.</p>
                                                <p>Any cost that includes overhead in form of offices worldwide leads to high price; which is recovered from the client in some or other way. Fly-hi believes in using technology that can help every client save this cost. In an era of computers and internet, local presence is merely a mindset. Infact, being located at single location helps us to follow many levels of audit and standardization for each client under strict supervision.</p>
                                                <p>We spend time with our staff and it shows in our values and approach. Our stability and confidence is demonstrated through our attention to detail and our personalised service offering.</p>
                                            </div>

                                            <div id="tabs-2">
                                                <h2>Transparency </h2>
                                                <p>We offer 100% transparency to the clients by giving an access of the travel portal, while educating them at the same time.</p>
                                            </div>
                                            <div id="tabs-3">
                                                <h2>Reliability</h2>
                                                <p>Being open 24/7/366 and offering uninterrupted travel services for all our customers is not enough. We bring in human comfort zone, which means at each stage our customers are dealing with a dedicated team. At any time, the same team who knows your case study will respond and deal with you.</p>
                                            </div>
                                            <div id="tabs-4">
                                                <h2>Dedicated Bandwidth</h2>
                                                <p>Fly-hi has adopted the best practices from CRM (Customer Relationship Management) disciplines and has appointed to each Client a dedicated Account Manager, who takes full responsibility for customer care. We have extended this concept such that we truly provide 24/7/366 service to our Clients. And we mean exactly that – all hours of a day, all days of a year.</p>
                                            </div>

                                            <div id="tabs-5">
                                                <h2>Customized Solution</h2>
                                                <p>We craft tailor-made solutions to meet your requirement. Our engagement with you starts by developing a keen understanding of your business and travel program requirements. We then tailor our services to best support and fulfil the business objectives. Right from the requisition process to billing to reporting, we work in innovative ways to provide the best-fit solutions. We adapt, modify and ultimately deliver the best.</p>
                                            </div>
                                            <div id="tabs-6">
                                                <h2>Bring in human connect</h2>
                                                <p>It is not just about providing travel services. It is about taking care of our customers and bringing human values in our day to day operations.</p>
                                            </div>
                                            <div id="tabs-7">
                                                <h2>Local Purchased Global Fares</h2>
                                                <p>Fly Hi is able to offer our clients more competitive rates, buying overseas in local markets. We identify saving mechanisms in fares database and through our global alliances worldwide. Fly Hi can obtain special rates available in the local market.</p>
                                                <p>For example, fare from Hong Kong to Dubai can be cheaper if purchased in local currency, rather than by a Marine fare.</p>
                                            </div>
                                            <div id="tabs-8">
                                                <h2>Free trial quotes</h2>
                                                <p>We offer free trial to our prospective clients with zero transaction fee.By doing so, our prospective clients get an opportunity to benchmark cost, efficiency and quality.</p>
                                            </div>
                                            <div id="tabs-9">
                                                <h2>24/7/366 non-stop global support services</h2>
                                                <p>Global 24-hour coverage is crucial when dealing with any travel emergencies. The availability of this type of 24-hour coverage is essential in the world of marine travel. It certainly illustrates one of the advantages of the Fly Hi global service, which would not be possible, if dealing with an ordinary or local travel agency. Since marine travel is global, we have structured ourselves so that we can service our clients across all time zones at any time.</p>
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
