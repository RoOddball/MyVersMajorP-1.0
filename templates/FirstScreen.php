<!html doctype>
<html lang = "en">




<head>
    <meta name="viewport" content="width=device-width, initial-scale=4">
    <meta charset = "utf-8">
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <title>UFC World</title>
    <style> @import "css/background.css";
        body {
            font-family: "Lato", sans-serif;
        }

        .sidepanel  {
            width: 0;
            position: fixed;
            z-index: 1;
            height: 250px;
            top: 0;
            left: 0;
            background-color: #a2ff4f;
            overflow-x:  hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidepanel a:hover {
            color: #f13360;
        }

        .openbtn{
            color: maroon;
            background-color: rgba(218, 144, 99, 0.33);

            height: 100px;
            no border;
        }

        .openbtn:hover {
            background-color: #ffdcb1;

        }

    </style>


</head>


<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.php?action=about">About</a>
    <a href="index.php?action=register">Register</a>
    <a href="index.php?action=login">Login</a>
    <a href="index.php?action=contact">Contact</a>
</div>


<button class="openbtn" onclick="openNav()">☰ Toggle Sidepanel</button>

<h1>MMAhub</h1>
<!-- navigation bar -->

<h2><li><a href="index.php?action=register">Register</a></li></h2>
  <h2><li><a href="LoginScreen.html">Login</a></li></h2>


</body>

</html>

<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>
