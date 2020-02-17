<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub</title>
<!--
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body style="background-color: rgba(230,217,230,0.3)">

<h1 align="center" style="color: darkred"><b>Welcome</b></h1>

<!-- navigation bar -->

 <div class="navbar navbar-default" style="background-color: rgba(30,120,100,0.5); font-size:150% ">
    <ul class="nav navbar-nav" style="width: 100%">
        <li style="width: 25%"><a href="DisplayRankings.php" style="color: black">Rankings</a></li>
        <li style="width: 25%"><a href="DisplayArchive.php" style="color: black">Archive</a></li>
        <li style="width: 25%"><a href="AdminTool.php" style="color: black">Admin Tool</a></li>
        <li style="width: 25%"><a href ="index.php?action=logout" style="color: black">Logout</a></li>
    </ul>
 </div>

<div class="navbar" style="width: 100%">
    <ul class="nav navbar-nav" style="width: 100%">
        <li style="width: 33%">
            <form action="index.php" method= "POST" >
                 <input type="hidden" name="action" value="homeSearch">


                <div class="navbar" style="margin-right: 20px">
                    <ul class="nav" >
                        <li><input type="text" name="homeSearchLabel" id="homeSearchLabel" placeholder="   Enter Fighter Here" style="height: 60px;
background-color:seashell; border-radius: 12px;width: 60%"></li>
                        <li><p>&nbsp</p></li>
                        <li><button id="homeSearchBut" style="border-style: dot-dash;background-color: rgba(80,138,154,0.6); border-radius: 30px;height: 60px;border: none; width: 60%;alignment: center; font-size: 250%; color: rgba(200,20,60,.8)">Search</button></li>
                    </ul>
                </div>

            </form>
        </li>
        <li style="width: 33%">
            &nbsp
        </li>


        <li style="width: 33%">
            <!--
            <div id="fb-root"></div>
            <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>


            <div class="fb-video" data-href="https://www.facebook.com/watch/?v=789070631599746&external_log_id=0eba10feaa6a9ebe0ac02dc2a68e2adb&q=mojahed%20fudailat" data-width="500" data-show-text="false">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/facebook/videos/10153231379946729/">
                        <a href="https://www.facebook.com/facebook/videos/10153231379946729/">How to Share With Just Friends</a>
                        <p>How to share with just friends.</p>
                        Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
                    </blockquote>
                </div>

            </div>
            -->
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>
            <div class="fb-page" data-href="https://www.facebook.com/MojahedFudailat/" data-tabs="timeline"
                 data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true"
                 data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/facebook">Facebook</a>
                </blockquote>
            </div>
        </li>
    </ul>
</div>


<br>
<br>



</body>
</html>
