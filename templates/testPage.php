<?php include'nav.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    <title>compare fighters</title>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/api.js"></script>
    <title>stats</title>

    <style>
        body{
            background-color: rgba(230,217,230,0.3)
        }
        div.scrollmenu {

            background-color: aliceblue;
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu a {
            width: 80%;
            display: inline-block;
            color: white;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: papayawhip;
        }
        ul.scrollmenu {
            display: inline-list-item;

        }
    </style>

</head>
<body >



    <?php


    $keyword = $searchQuery;

    //DENAS get an api key please dont use mine

    $apikey = 'AIzaSyCtjx8gYCgn2MuoJbYDA4c-GMWipKjTZEg';
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . 15 . '&key=' . $apikey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $value = json_decode(json_encode($data), true);
    ?>




<div class="scrollmenu">

        <?php

        for ($i = 0; $i < 15; $i++) {
           @$videoId = $value['items'][$i]['id']['videoId'];
            @$title = $value['items'][$i]['snippet']['title'];
            //$description = $value['items'][$i]['snippet']['description'];
            ?>

            <a data-html="video" style="width: 30%">
            <div class="video-tile" id="video<?=$i?>" >
                <div  class="videoDiv">
                    <iframe id="iframe" style="width:100%;height:25%" src="//www.youtube.com/embed/<?php echo $videoId; ?>"
                                data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1" allowfullscreen></iframe>
                </div>
                <div class="videoInfo">
                    <!--<div class="videoTitle" ><b><?php echo $title; ?></b></div>-->
                </div>
            </div>
            </a>



            <?php
        }
        ?>
</div>
    <div class="navbar" style="background-color: lavender; border: none">
        <ul class="nav navbar-nav" style="width: 100%">
            <li style="width: 50%"><div class="label" style="alignment: center"><h1 style="color: red;"><?=$fighterRedStats[0]?></h1></div></li>
            <li style="width: 50%"><div class="label" style="alignment: center"><h1 style="color: blue"><?=$fighterBlueStats[0]?></h1></div></li>
        </ul>
    </div>


    <div data-role="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%;">
            <li style="width: 100%"><div class="label" style="alignment:left"><p style="font-size: 150%;color: black">Weight Class -&nbsp <?=$fighterRedStats[1]?></p></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width: 100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[2]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Height</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[2]?></div></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[3]?></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Pay per view rank</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[3]?></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[4]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Country</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[4]?></div></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[5]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Wins</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[5]?></div></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[6]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Losses</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[6]?></div></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[7]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Draw</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[7]?></div></div></li>
        </ul>
    </div>

    <div class="navbar" style="background-color: rgba(1,1,1,0.1)">
        <ul class="nav navbar-nav" style="width:100%">
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterRedStats[8]?></div></div></li>
            <li style="width: 40%"><div class="label" style="color: black"><div style="font-size: 150%">Date Of Birth</div></div></li>
            <li style="width: 30%"><div class="label" style="alignment: center"><div style="color: black"><?=$fighterBlueStats[8]?></div></div></li>
        </ul>
    </div>

</body>
</html>