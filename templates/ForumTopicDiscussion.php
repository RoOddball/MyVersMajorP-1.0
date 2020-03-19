<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub -Forum topic discussion</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
    <style>
        body{
            font-family: "Didact Gothic", sans-serif;
            background-color: rgba(21,18,4,.05);
        }
        h1{
            font-family: "Allerta Stencil",sans-serif;
            color: rgba(31,95,151,.8);
        }
        #commitTopicCommentButton{
            color: rgba(230,90,130,.8);
            border-radius: 12px;
            height: 10%;
            width: 23%;
            outline: 0!important;
            border:none;
            background-color: rgba(50,145,210,.5);
            font-size: 130%;
        }
        #commitTopicCommentButton:hover{
            background-color: rgba(0,0,0,.7);
            color: wheat;
        }
        button{
            border: none;
            background-color: rgba(50,145,230,.3);
            color:rgba(220,81,60,.8);
            border-radius: 20px;
            outline: 0!important;
        }
        button:hover{
            background-color: rgba(0,0,0,.7);
            color: wheat;
        }
        i {
            border: solid rgba(220,81,60,.8);
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
        }
        .up{
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
        }
        a:hover{
            text-decoration: none;
            color:wheat;
        }

    </style>
</head>
<body>
<div>
    <p><button><a href="index.php?action=forum"> &nbsp <i class="up"> </i>&nbsp<b>   up to form topics </b> &nbsp</a></button></p>
</div>

    <div style="text-align: center">
        <h1><b>Topic: #<?=$topicTitle?></b></h1>
    </div>
<br><br><br><br>

<?php foreach($commentResults as $commentResult):?>

    <div class="navbar">
        <ul class="nav navbar-nav" style="width: 100%; padding-left: 5%">
            <li style="width:20%">
                <div style="text-align: left; font-size: 200%; font-family: 'Didact Gothic'; color: rgba(71, 38, 40, .8);">
                    <b><?=$commentResult[2]?></b>
                </div>
            </li>
            <li style="width: 80%">
                <div class="text" style="text-align: center; background-color: rgba(7,33,5,.05); min-height: 10%;
                border-radius: 10px; ">
                    <p style="text-align: left; font-size:80%;color: gray"><b>&nbsp &nbsp &nbsp <?=$commentResult[4]?></b></p>
                    <p style="text-align: left; font-size: 120%">&nbsp<?=$commentResult[3]?></p>
                </div>
            </li>
        </ul>
    </div>
<?php endforeach; ?>

    <div>
        <form action="index.php" method="POST" >

            <input type="hidden" name="action" value="commitComment">
            &nbsp &nbsp<input type="submit" name="commitTopicCommentButton" id = "commitTopicCommentButton" value="post comment" >

            <input type="text" name = "forumComment" id ="forumComment" placeholder = "   comment here" required style="border-radius: 15px; border:none;
            height: 10%; width: 75.5%; background-color: rgba(33,97,60,.07); outline: 0!important;text-align:center; font-size: 120%; alignment: right">


        </form>
    </div>
</body>
</html>