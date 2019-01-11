
<meta charset="utf-8" />
<title>FLY-HI</title>
<link rel="stylesheet" href="css/layout.css" />
<link rel="stylesheet" href="css/jflow.style.css"/>
<link rel="shortcut icon" href="favicon(4).ico"/>
<link rel="stylesheet" href="css/menu.css" />
<link rel="stylesheet" href="css/validation.css" />
<?php if(basename($_SERVER['SCRIPT_FILENAME']) == 'PayOnline.php' || basename($_SERVER['SCRIPT_FILENAME']) == 'test.php' ){?>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<?php }else{ ?>

<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>

<?php } ?>

<script src="js/jflow.plus.min.js" type="text/javascript"></script>
<script src="js/validation.js" type="text/javascript"></script>
<script src="js/validation-en.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {

        $("#myController").jFlow({
            controller: ".jFlowControl", // must be class, use . sign

            slideWrapper: "#jFlowSlider", // must be id, use # sign

            slides: "#mySlides", // the div where all your sliding divs are nested in

            selectedWrapper: "jFlowSelected", // just pure text, no sign

            effect: "flow", //this is the slide effect (rewind or flow)

            width: "100%", // this is the width for the content-slider

            height: "402px", // this is the height for the content-slider

            duration: 100, // time in milliseconds to transition one slide

            pause: 5000, //time between transitions

            prev: ".jFlowPrev", // must be class, use . sign

            next: ".jFlowNext", // must be class, use . sign

            auto: true

        });

    });

</script>