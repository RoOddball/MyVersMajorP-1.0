<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>External panels - jQuery Mobile Demos</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="../_assets/css/jqm-demos.css">
    <script src="../js/jquery.js"></script>
    <script src="../_assets/js/index.js"></script>
    <script src="../js/jquery.mobile-1.4.5.min.js"></script>
    <title>UFC World</title>
</head>
<body>
<?php
$i=0;
foreach ($stats as $stat):
    ?>
<div data-role="collapsible" id="mypanel">
    <h2><?=$stat[1]?></h2>
    <?php
    foreach($stat as $s):
        if($i==0){

            print '<br><hr><br>';
            print '<br><br>';
        }
    ?>

     <?=$fields[$i]?>      <?=$s?> <br>

<?php
        $i= ($i+1)%9;
    endforeach;
    ?>
    </div>
<br><hr><br>
<?php
endforeach;

@$searchElement = str_replace(' ', '-', $stat[1]);
$result = file_get_contents('https://gnews.io/api/v3/search?q='.$searchElement.'&token=d5f1a0058a3f693557a503d7f32a5da7');
//$result = file_get_contents('https://newsapi.org/v2/top-headlines?q='.$searchElement.'&from=2019-11-18&sortBy=publishedAt&apiKey=30ebb50571ca4f0496eb6af9e838db4b');
//@$title = json_decode($result,true)["articles"][0]["title"];
//@$link = json_decode($result,true)["articles"][0]["url"];
//print "$title". PHP_EOL .PHP_EOL;
print PHP_EOL .'<br>';
//print '<a href='.$link.'/>'.$title.'</a>'. PHP_EOL .PHP_EOL;
//print PHP_EOL .'<br><hr><hr><br>';
$headlines = json_decode($result,true);

foreach($headlines["articles"] as $headline):
?>

<?='<a href='.$headline["url"].'>'.$headline["title"].'</a>'?><br>

<?php

endforeach;
'<br><hr><hr><br>'
?>



<!--//var_dump(json_decode($result,true));
//$result = file_get_contents('https://newsapi.org/v2/top-headlines?q=jon&from=2019-11-18&sortBy=publishedAt&apiKey=30ebb50571ca4f0496eb6af9e838db4b');

//$title = json_decode($result,true)["articles"][0]["title"];
//$link = json_decode($result,true)["articles"][0]["url"];
//print "$title". PHP_EOL .PHP_EOL;
//print PHP_EOL .' <br>';
//print '<!<a href='.$link.'/>'.$title.'</a>'. PHP_EOL .PHP_EOL;
//print PHP_EOL .'<br><hr><hr><br>';





</body>
</html>
<script id="panel-init">
    $(function() {
        $( "body>[data-role='panel']" ).panel();
    });
</script>



<!-- new page -->




