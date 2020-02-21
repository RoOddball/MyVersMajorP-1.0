<!html doctype>
<html lang = "en">




<head>
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=4">
    <meta charset = "utf-8">
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
            -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>UFC World</title>
    <style>
        body {
            font-family: "Lato";
            background-color: rgba(20, 10, 100, .02);
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
            background-color: rgba(10,33,12,.7);
            border: none;
            width: 30%;
            border-radius:10px;
            margin-top: 5px;
            margin-bottom: 5px;
            outline: 0!important;

        }

        .openbtn:hover {
            background-color: rgba(155, 40, 20, .8);
        }
        .closebtn{
            display: none;
        }

    </style>


</head>

<body>
<div id="mySidepanel" class="sidepanel">


    <p align="center" >
        <button type="button"  data-toggle="modal" data-target="#loginModal" style="width: 100%; background-color: rgba(190,220,240,1);border: none">
        login
        </button>
    </p>

    <p align="center">
        <button type="button"  data-toggle="modal" data-target="#registerModal" style="width: 100%; background-color: rgba(190,220,240,1);border: none">
        register
       </button>
    </p>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="alignment: center"><p align="center">nvm</p></a>
</div>

<div class="panel" align="center" style="">
    <button class="openbtn" onclick="openNav()" ><p style="font-size: 300%; color: rgba(190,220,240,1)">MMAhub</p></button>
</div>

<div class="panel" align="center" style="padding-top:10%">
    <img src = "http://localhost:8000/images/MajorLogo.jpg" alt="" style="opacity:.5; width:20%; length:20%">
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