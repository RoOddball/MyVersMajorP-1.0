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
    <link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
    <title>stats</title>

    <style>
        body{
            background-color: rgba(230,217,230,0.3)
            font-family: 'Allerta Stencil',sans-serif
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
        .w3-table-all tr td{

        }

    </style>

</head>
<body >

&nbsp
<div>  &nbsp &nbsp ...a youtube result based on the query: "<?php echo str_replace('%20',' ',$searchQuery) ?>"</div>
&nbsp

    <?php


    $keyword = $searchQuery;

    //DENAS get an api key please dont use mine

    $apikey = 'AIzaSyCzQYD7xhrEldov3qDtmOtZ5Fpwgh75NFg';
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
    <table class="w3-table-all w3-centered">
        <tr>
            <td style="background-color: aliceblue; color:rgba(224,44,59,1); font-family: 'Allerta Stencil',sans-serif; font-size: 300%;width:40%"><?=$fighterRedStats[0]?></td>
            <td style="font-size: 300%;width: 20%; background-color: rgba(10,10,150,.1);text-shadow: 1px 1px 1px red; font-family: 'Allerta Stencil',sans-serif">vs</td>
            <td style="background-color: aliceblue; color:rgba(59,44,224,1); font-family: 'Allerta Stencil',sans-serif; font-size: 300%;width: 40%"><?=$fighterBlueStats[0]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[1]?></td>
            <td>weight class</td>
            <td><?=$fighterBlueStats[1]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[2]?></td>
            <td>height</td>
            <td><?=$fighterBlueStats[2]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[3]?></td>
            <td>PPV rank</td>
            <td><?=$fighterBlueStats[3]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[4]?></td>
            <td>country of origin</td>
            <td><?=$fighterBlueStats[4]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[5]?></td>
            <td>wins</td>
            <td><?=$fighterBlueStats[5]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[6]?></td>
            <td>losses</td>
            <td><?=$fighterBlueStats[6]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[7]?></td>
            <td>draw</td>
            <td><?=$fighterBlueStats[7]?></td>
        </tr>
        <tr>
            <td><?=$fighterRedStats[8]?></td>
            <td>date of birth</td>
            <td><?=$fighterBlueStats[8]?></td>
        </tr>
    </table>

</body>
</html>