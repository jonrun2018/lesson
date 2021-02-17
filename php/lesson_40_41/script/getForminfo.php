<?php

$first_name = trim($_REQUEST["first_name"]); // rtrim - убирает пробелы с права, ltrim - убирает пробелы с лева
$last_name = trim($_REQUEST["last_name"]);
$email = trim($_REQUEST["email"]);
$facebook_url = str_replace("facebook.org", "facebook.com", trim($_REQUEST["facebook_url"]));
$position = strpos($facebook_url, "facebook.com");
if($position === false) {
    $facebook_url = "http://facebook.com/" . $facebook_url;
} else {
    $facebook_url = "http://" . $facebook_url;
}
$twitter_handle = trim($_REQUEST["twitter_handle"]);
$twitter_url = "http://twitter.com/";
$position = strpos($twitter_handle, "@");
if($position === false) {
    $twitter_url = $twitter_url . $twitter_handle;
} else {
    $twitter_url = $twitter_url . substr($twitter_handle, $position+1);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/phpMM.css">
</head>
<body>

    <div id="header"><h1>PHP & MySQL</h1></div>
    <div id="example">Пример</div>

    <div id="content">
        <p>Это структура с данными, получиными из формы</p>
        <p>

            Имя: <?php echo $first_name . " " .$last_name;?><br>
            E-mail: <?php echo $email;?><br>
            <a href="<?php echo $facebook_url;?>">Ваша страница на Facebook</a><br>
            <a href="<?php echo $twitter_url;?>">Проверьте свуой Twitter канал</a>
        
        </p>
    </div>
</body>
</html>