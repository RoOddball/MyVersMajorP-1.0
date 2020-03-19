<!html doctype>
<html lang = "en">




<head>
<!--
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>

    <title>UFC World</title>

    <style>
        body {
            font-family: "Allerta Stencil",sans-serif;
            background-image: radial-gradient(white,rgba(245,114,186,.05),rgba(112,35,68,.2));
        }

        .sidepanel  {
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgba(10,40,30,.3);
            overflow-x:  hidden;
            transition: 0.5s;
        }

        .sidepanel a {
            text-decoration: none;
            font-size: 25px;
            color: #f1f1f1;
            display: block;
            transition: 0.3s;
            alignment: center;
        }

        .sidepanel a:hover {
            color: #f13360;
        }

        .openbtn{
            horiz-align: center;
            background-color: rgba(10,33,12,.4);
            border: none;
            width: 30%;
            border-radius:10px;
            margin-top: 5px;
            margin-bottom: 5px;
            outline: 0!important;
            font-size: 300%;
            color: rgba(190,220,240,1)
        }

        .openbtn:hover {
            text-shadow:2px 2px 2px black ;
            transition: font 5s ease;
            background-color: rgba(120,81,60,.6);
            color:rgba(248,15,18,.8);
        }

        .closebtn{
            display: none;
        }

        #mySidepanel button{
            width: 100%;
            background-color: rgba(190,220,240,1);
            border: none
        }

        #mySidepanel button:hover{
            font-size:  200%;
            background-color: rgba(120,81,60,.6);
            color:wheat;
            transition: font 1s ease;
        }
        .panel{
            align-self: center;
            opacity: 70%;
            background-color: rgba(0,0,0,0);
        }
        img{
            width: 20%;
        }
        .navbar-nav li{
            width:25%;
        }

    </style>


</head>

<body>
<div id="mySidepanel" class="sidepanel">


    <p align="center" >
        <button type="button"  data-toggle="modal" data-target="#loginModal" >
        login
        </button>
    </p>

    <p align="center">
        <button type="button"  data-toggle="modal" data-target="#registerModal" >
        register
       </button>
    </p>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="alignment: center"><p align="center">nvm</p></a>
</div>

<div class="panel" align="center" style="">
    <button class="openbtn" onclick="openNav()" ><p>MMAhub</p></button>
</div>


<br><br><br>
<p style="font-family: 'Didact Gothic',sans-serif"> &nbsp &nbsp &nbsp welcome to our site!</p>

<div class="panel" align="center"><img src="MajorLogo.jpg" alt=""></div>
<br>
<p align="right" style="font-family: 'Didact Gothic',sans-serif">... we would like to express out appreciation to the following entities for their helping with the development of this site &nbsp &nbsp &nbsp</p>

<div class="navbar">
    <ul class="nav navbar-nav">
        <li><a href="https://gnews.io/"><p style="font-family: Impact, sans-serif">GNews<font style="font-family: 'Didact Gothic',sans-serif"> api</font></p></a></li>
        <li><a href="https://www.ufc.com/"><img src="../images/UFC.png" alt=""></a></li>
        <li><a href="https://www.youtube.com/"><img src="../images/youTube.png" alt=""></a></li>
        <li style="font-family: 'Didact Gothic',sans-serif">and our boy<a href="https://www.facebook.com/MojahedFudailat/"
            style="font-family: 'Allerta Stencil',sans-serif">Mojahed</a>for the animees</li>
    </ul>
</div>


<div class="container" >

    <!-- The Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="background-color: rgba(200,230,220,1)">

                <form action="index.php" method="POST" >
                    <input type="hidden" name="action" value="processLogin">

                    <label for = "username"> Enter Username:</label>
                    <input type="text"  name = "username" id = "username" placeholder = "    Username" required style="border-radius: 15px">

                    <label for = "password"> Enter Password:</label>
                    <input type="password" name = "password" id ="password" placeholder = "    Password" required style="border-radius: 15px">
                    <input type="submit" name="loginBut" style="border-radius: 10px; background-color: dodgerblue; border-color: red">

                </form>

            </div>
        </div>
    </div>

</div>

<div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="background-color: rgba(200,210,250,1)">

                <form action="index.php" method="POST" >

                    <input  type="hidden" name="action" value="processRegister">


                    <label for = "username"> Enter Username:</label>
                    <input type="text" name = "username" id = "username" placeholder = "   Username" required style="border-radius: 15px">

                    <label for = "password"> Enter Password:</label>
                    <input type="password" name = "password" id ="password" placeholder = "   Password" required style="border-radius: 15px">

                    <label for = "address"><p> Enter Email address:</p></label>
                    <input type="text" name = "address" id = "address" placeholder = "   Address" required style="border-radius: 15px">

                    <input type="submit" name = "registerBut" style="border-radius: 10px; background-color: dodgerblue; border-color: red" >



                </form>

            </div>
        </div>
    </div>

</div>

<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>

</body>

</html>