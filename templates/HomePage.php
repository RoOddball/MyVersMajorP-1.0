
<!html doctype>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>UFC World</title>
    <style> @import "css/background.css";
        @import "css/NavBar.css";
    </style>


</head>

<body>



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

    <label for = "homeSearchLabel"> Enter Username:</label>
    <input type="text"  name = "homeSearchLabel" id = "homeSearchLabel" placeholder = "Fighter/Event" required>

    <input type="submit" name="homeSearchBut" >

</form>

<p>

</p>
<h3>
    Upcoming Fights:
</h3>

</body>
</html>