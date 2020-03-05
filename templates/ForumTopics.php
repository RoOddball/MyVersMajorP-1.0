<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub - Forum topics</title>
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



<h1 align="center" style="color: darkgrey"><b>Forum page</b></h1>



<div style="text-align: center; border: none;">
    <input type="button" id="startForumTopic" value="start a new topic" style="border-radius: 12px; height: 7%; width: 25%;
    outline: 0!important; border:none; background-color: rgba(50,50,50,.5); color: rgba(240,240,240,1); font-size: 200%"
           data-toggle="modal" data-target="#newTopicModal">
</div>


<div class="modal fade" id="newTopicModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="background-color: rgba(200,230,220,1)">

            <form action="index.php" method="POST" >
                <input type="hidden" name="action" value="commitTopic">



                <label for = "forumTopic"> New Topic</label>
                <input type="text" name = "forumTopic" id ="forumTopic" placeholder = "    topic" required style="border-radius: 15px">
                <input type="submit" name="commitForumTopicButton" style="border-radius: 10px; background-color: dodgerblue; border-color: red">

            </form>

        </div>
    </div>
</div>

<br><br><br>
<?php
foreach($topicResults as $topicResult):
    $topicTitle = $topicResult[1];
  ?>
    <p style="font-size:200%; text-align: center"><a href="index.php?action=forumTopicDiscussion&topicTitle=<?php echo $topicTitle; ?>" style="alignment: center"><?=$topicTitle?></a></p>

<?php
endforeach;
?>


</body>
</html>
