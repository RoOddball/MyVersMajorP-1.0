<!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
</head>
<body>
<p><a href="index.php?action=home" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b">Back home</a></p>
    <p><h2>Fighters</h2></p>
    <p><div data-role="navbar" style="height: max-content ;background-color: dodgerblue;text-overline-color: red"><ul><li></li><li><h1><?=$fighterRedStats[0]?></h1></li><li><h1><?=$fighterBlueStats[0]?></h1></li></ul></div></p>
    <p><h2>Class</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[1]?></li><li><?=$fighterBlueStats[1]?></li></ul></div></p>
    <p><h2>Height</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[2]?></li><li><?=$fighterBlueStats[2]?></li></ul></div></p>
    <p><h2>Pay per view rank</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[3]?></li><li><?=$fighterBlueStats[3]?></li></ul></div></p>
    <p><h2>Country</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[4]?></li><li><?=$fighterBlueStats[4]?></li></ul></div></p>
    <p><h2>Wins</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[5]?></li><li><?=$fighterBlueStats[5]?></li></ul></div></p>
    <p><h2>Losses</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[6]?></li><li><?=$fighterBlueStats[6]?></li></ul></div></p>
    <p><h2>Draw</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[7]?></li><li><?=$fighterBlueStats[7]?></li></ul></div></p>
    <p><h2>Date Of Birth</h2></p>
    <p><div data-role="navbar"><ul><li></li><li><?=$fighterRedStats[8]?></li><li><?=$fighterBlueStats[8]?></li></ul></div></p>


</body>
</html>