<?include 'nav.php'?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC World</title>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
</head>

<body>

<div data-role="homePage">

<h1>Home Page</h1>
<!-- navigation bar -->
<ul>

    <li><a href="DisplayRankings.php">Rankings</a></li>
    <li><a href="DisplayArchive.php">Archive</a></li>
    <li><a href="AdminTool.php">Admin Tool</a></li>
    <li><a href ="index.php?action=logout">Logout</a></li>
</ul>

<form action="index.php" method="POST" >
    <input type="hidden" name="action" value="homeSearch">
    <label for = "homeSearchLabel"> Enter fighter name</label>
    <div data-role="navbar"><ul><li><input type="text" name="homeSearchLabel" id="homeSearchLabel" placeholder="Fighter" ></li>
            <li><a href="index.php?action=homeSearch">Search</a></li><li><label ></li>
        </ul>
    </div>
</form>

<p>

</p>
<h3>
    Upcoming Fights:
</h3>
</div>

</body>
</html>
