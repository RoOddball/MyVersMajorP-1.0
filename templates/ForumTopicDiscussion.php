<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub -Forum topic discussion</title>
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
<body>

    <div style="text-align: center">
        <h1 style="color: rgba(26,40,18,.8)"><b>Topic - <?=$topicTitle?></b></h1>
    </div>
<br><br><br><br>

<?php foreach($commentResults as $commentResult):?>

    <div class="navbar">
        <ul class="nav navbar-nav" style="width: 100%; padding-left: 5%">
            <li style="width:20%">
                <div style="text-align: left; font-size: 200%; font-family: 'Calibri Light'; color: rgba(71, 38, 40, .8);">
                    <?=$commentResult[2]?>
                </div>
            </li>
            <li style="width: 80%">
                <div class="text" style="text-align: center; background-color: rgba(241,235,220,.5); min-height: 10%;
                border-radius: 10px; ">
                    <?=$commentResult[3]?>
                </div>
            </li>
        </ul>
    </div>
<?php endforeach; ?>

    <div>
        <form action="index.php" method="POST" >

            <input type="hidden" name="action" value="commitComment">
            &nbsp &nbsp<input type="submit" name="commitTopicCommentButton" id = "commitTopicCommentButton" value="post comment" style="border-radius: 10px; background-color:
            rgba(190,189,211,.2); border:none; text-align:center; height: 10%; width: 23%; font-size: 200%; color: midnightblue">

            <input type="text" name = "forumComment" id ="forumComment" placeholder = "   comment here" required style="border-radius: 15px; border:none;
            height: 20%; width: 75.5%; background-color: rgba(171,210,150,.1); outline: 0!important;text-align:center; font-size: 120%; alignment: right">


        </form>
    </div>
</body>
</html>