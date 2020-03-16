<?php include'nav.php' ?>
<!html doctype>
<html lang = "en">
<head>

    <title>UFC Hub - Forum topics</title>
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
            font-family: "Lato", sans-serif;
            background-color: rgba(211,232,241,.1);
        }
        h1{
            font-family:"Allerta Stencil",sans-serif ;
            color: rgba(31,95,151,.8);

        }
        #startForumTopic{
            color: rgba(230,90,130,.8);
            border-radius: 12px;
            height: 7%;
            width: 25%;
            outline: 0!important;
            border:none;
            background-color: rgba(50,145,210,.5);
            font-size: 200%
        }
        #startForumTopic:hover {
            background-color: rgba(0, 0, 0, .7);
            color: wheat;
        }
        .w3-table tr{
            background-color: rgba(42,136,76,.1);
        }
        .w3-table tr td:hover{
            text-decoration: none;
            font-size: 150%;
            transition: font 0.5s ease
        }
        .w3-table tr td a:hover{
            text-decoration: none;
        }
    </style>
</head>

<body>
<h1 align="center"><b>Forum page</b></h1>
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
<table class="w3-table w3-bordered">
    <tr style="background-color: rgba(0,0,0,0)">
        <td><h2 style="text-align: center; font-family:'Allerta Stencil',sans-serif; color:rgba(220,81,60,.8)"><b>Topics</b></h2></td>
    </tr>
<?php
foreach($topicResults as $topicResult):
    $topicTitle = $topicResult[1];
  ?>
<tr>
    <td>
    <p style="font-size:200%; text-align: center"><a href="index.php?action=forumTopicDiscussion&topicTitle=<?php echo $topicTitle; ?>">#<?=$topicTitle?></a></p>
    </td>
</tr>
<?php
endforeach;
?>
</table>
<br><br><br>
<div style="text-align: center; border: none;">
    <input type="button" id="startForumTopic" value="start a new topic"
           data-toggle="modal" data-target="#newTopicModal">
</div>
</body>
</html>
