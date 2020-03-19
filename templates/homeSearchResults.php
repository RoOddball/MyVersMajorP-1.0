<?php include'nav.php' ?>
<!DOCTYPE html>
<html lang = "en">
<head><title></title>

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

<?php
if($stats) {
    $i = 0;
    $_SESSION['fighter'] = [];
    foreach ($stats as $stat):
        $nameFighterOne = mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[2]))[0][0];
        $nameFighterTwo = mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[3]))[0][0];
        $nameFighterWin = mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[5]))[0][0];
        array_push($_SESSION['fighter'], [0 => $stat[2], 1 => $stat[3]]);
        ?>
        <button type="button" class="collapsible" style="border-radius: 30px">
                Event: <?= $stat[0] ?> Venue: <?= $stat[1] ?> -- <?= $nameFighterOne ?> vs <?= $nameFighterTwo ?> --
            on <?= $stat[4] ?> result <?= $nameFighterWin ?> by way of <?= $stat[6] ?>
        </button>

        <div class="content">

            <div class="label" style="alignment: center; ">
                <a href="index.php?action=fighterStats&i=<?= $i ?>" style="alignment: center"><p
                            style="alignment: center; color: maroon; font-size: 150%">Compare fighters</p></a>
            </div>

            <div class="W3-container">
                <?php

                @$searchElement = explode(" ", $nameFighterOne)[1] . "-" . explode(" ", $nameFighterTwo)[1];
                $result = file_get_contents('https://gnews.io/api/v3/search?q=' . $searchElement . '&token=d5f1a0058a3f693557a503d7f32a5da7');

                print PHP_EOL . '<br>';
                $headlines = json_decode($result, true);


                print '<br><hr><br>';

                $i++;


                foreach ($headlines["articles"] as $headline):
                    ?>

                    <ul class="w3-ul w3-card">
                        <li><a href="<?= $headline["url"] ?>"><?= $headline["title"] ?></a></li>
                    </ul>

                <?php
                endforeach;
                ?>
            </div>
        </div>
    <?php
    endforeach;
}else{
    $errorMessage = "&nbsp &nbsp &nbsp". 'no results for this query';
    include '../templates/error.php';
}
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





