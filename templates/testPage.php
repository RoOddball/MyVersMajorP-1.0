<?php include'nav.php' ?>
<!DOCTYPE html>
<html>
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
</head>
<body style="background-color: rgba(230,217,230,0.3)">
    <p><a href="index.php?action=home" class="previous"><button style="border: none;background-color: darkgrey;border-radius: 20px">&laquo; back home</button></a></p>

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