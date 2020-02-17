<?php include'nav.php' ?>
<!DOCTYPE html>
<html lang = "en">
<head><title></title>

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        .collapsible {
            background-color: rgba(50,50,50,0.1);
            color: rgba(210,80,10,1);
            cursor: pointer;
            padding: 5px;
            width: 100%;
            border: none;
            text-align: center;
            outline: none;
            font-size: 120%;
            height: fit-content;
        }

        .active, .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 10px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>

</head>
<body style="background-color: rgba(230,217,230,0.3)">
<div data-role="page" id="main">
    <p><a href="index.php?action=home" class="previous"><button style="border: none;background-color: darkgrey;border-radius: 20px">&laquo; back home</button></a></p>

<?php
$i=0;
$_SESSION['fighter']= [];
foreach ($stats as $stat):
    $nameFighterOne=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[2]))[0][0];
    $nameFighterTwo=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[3]))[0][0];
    $nameFighterWin=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[5]))[0][0];
    array_push($_SESSION['fighter'],[0 =>$stat[2],1 =>$stat[3]]);
?>
<!-- jquery vers <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u"> -->
    <button type="button" class="collapsible" style="border-radius: 30px">
        Event: <?=$stat[0]?> Venue: <?=$stat[1]?> -- <?=$nameFighterOne?> vs <?=$nameFighterTwo?> -- on <?=$stat[4]?> result <?=$nameFighterWin?> by way of <?=$stat[6]?>
    </button>
        <!--      
    <form action="index.php" method="POST" >
        <input type="hidden" name="action" value="fighterStats">
<!-->
    <div class="content">

        <div class="label" style="alignment: center; ">
            <a href="index.php?action=fighterStats&i=<?=$i?>" style="alignment: center"><p style="alignment: center; color: maroon; font-size: 150%">Compare fighters</p></a>
        </div>




        <div class="W3-container">
    <!--
    </form>
    <!-->
<?php

    @$searchElement = explode(" ",$nameFighterOne)[1]."-".explode(" ",$nameFighterTwo)[1];
    $result = file_get_contents('https://gnews.io/api/v3/search?q='.$searchElement.'&token=d5f1a0058a3f693557a503d7f32a5da7');

    print PHP_EOL .'<br>';
    $headlines = json_decode($result,true);


print '<br><hr><br>';

$i++;


foreach($headlines["articles"] as $headline):
?>

<!-- jquery vers <ul data-role="listview" data-inset="false"> -->
<ul class="w3-ul w3-card">
    <li><a href="<?=$headline["url"]?>"><?=$headline["title"]?></a></li>
</ul>

<?php
endforeach;
?>
        </div>
</div>
<?php
endforeach;
?>

</div>


<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>
</html>





