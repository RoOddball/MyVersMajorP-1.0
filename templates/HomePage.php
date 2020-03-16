<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub</title>

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
            background-color: rgba(30,117,230,0.03);
            font-family: 'Allerta Stencil',sans-serif
        }
        .navbar-default{
            background-color: rgba(30,120,100,0.5);
            font-size:200%;
            font-family: "Allerta Stencil",sans-serif;
        }
        .navbar-default ul li:hover{
            background-color: #555;
            color: wheat;
        }
        .navbar-default ul li a p:hover{
            color: wheat;
        }
        .navbar-default ul li a p{
           text-align: center;
        }
        .navbar-default ul li a p{
            color:black
        }
        #homeSearchBut{
            background-color: rgba(50,145,210,.5)
            border-radius: 30px;
            height: 60px;border: none;
            width: 60%;
            alignment: center;
            font-size: 250%;
            font-family: 'Didact Gothic';
            color: rgba(230,90,130,.8);
            outline: 0!important;"
        }
        #homeSearchBut:hover{
            background-color: #555555;
            color: aliceblue;
        }

    </style>
</head>

<body >

<h1 align="center" style="color: darkred"><b>Welcome</b></h1>

<!-- navigation bar -->

 <div class="navbar navbar-default" >
    <ul class="nav navbar-nav" style="width: 100%">
        <li style="width: 25%"><a href="DisplayRankings.php" ><p>Rankings</p></a></li>
        <li style="width: 25%"><a href="DisplayArchive.php" ><p>Archive</p></a></li>
        <li style="width: 25%"><a href="index.php?action=forum" ><p>Forum </p></a></li>
        <li style="width: 25%"><a href ="index.php?action=logout" ><p>Logout</p></a></li>
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
background-color:seashell; border-radius: 12px;width: 60%;outline: 0!important;"></li>
                        <li><p>&nbsp</p></li>
                        <li><button id="homeSearchBut" >Search</button></li>
                    </ul>
                </div>

            </form>
        </li>
        <li style="width: 33%">
            &nbsp
        </li>


        <li style="width: 33%">

            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>
            <div class="fb-page" data-href="https://www.facebook.com/MojahedFudailat/" data-tabs="timeline"
                 data-width="500" data-height="480" data-small-header="false" data-adapt-container-width="true"
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
