<!DOCTYPE html>
<html lang = "en">
<head><title></title>


    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <?include 'nav.php'?>
</head>
<body>
<div data-role="page" id="main">
<p><a href="index.php?action=home" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b" >Back home</a></p>
<?php
$i=0;
$_SESSION['fighter']= [];
foreach ($stats as $stat):
    $nameFighterOne=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[5]))[0][0];
    $nameFighterTwo=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[3]))[0][0];
    array_push($_SESSION['fighter'],[0 =>$stat[2],1 =>$stat[3]]);
?>
<div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u">
        <h4>Event: <?=$stat[0]?> Venue: <?=$stat[1]?> -- <?=$nameFighterOne?> vs <?=$nameFighterTwo?> -- on <?=$stat[4]?> result <?=$nameFighterOne?> by way of <?=$stat[6]?></h4>
  <!--      
    <form action="index.php" method="POST" >
        <input type="hidden" name="action" value="fighterStats">
<!-->
    <div data-role="navbar">
        <ul>
            <li><a href="index.php?action=fighterStats&i=<?=$i?>" style="background-color: crimson;border-color: blueviolet " class="ui-btn ui-shadow ui-corner-all ui-btn-b">Compare fighters</a></li>
        </ul>
    </div>





    <!--
    </form>
    <!-->
<?php

    @$searchElement = str_replace(' ', '-', $nameFighterOne);//."-".str_replace(' ','-',$nameFighterTwo);
    $result = file_get_contents('https://gnews.io/api/v3/search?q='.$searchElement.'&token=d5f1a0058a3f693557a503d7f32a5da7');

    print PHP_EOL .'<br>';
    $headlines = json_decode($result,true);


print '<br><hr><br>';

$i++;


foreach($headlines["articles"] as $headline):
?>

<ul data-role="listview" data-inset="false">
    <li><a href="<?=$headline["url"]?>"><?=$headline["title"]?></a></li>
</ul>

<?php
endforeach;
?>
</div>
<?php
endforeach;
?>

</div>
</body>
</html>





