<meta charset="UTF-8">

<?php

require_once "database_connection.php";

// получение id показываемого пользователя
$user_id = $_REQUEST['users_id'];

// Создание инструкции SELECT
$select_query = "SELECT * FROM users WHERE users_id = {$user_id}";

// Запуск запроса
$result = mysqli_query($link, $select_query);

if ($result) {
    // получение возвращаемых строк с помощью $result
    $row = mysqli_fetch_array($result);

    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $mail = $row['email'];
    $facebook_url = $row['facebook_url'];
    $twitter_handle = $row['twitter_handle'];
    $bio = preg_replace("/[\r\n]+/", "</p><p>", $row['bio']);
    $user_image = get_web_path($row['user_pic_path']);
    
    // превращение $twitter_handle в url
    $position = strpos($twitter_handle, "@");
    $twitter_url = "https://twitter.com/". substr($twitter_handle, $position + 1);
} else {
    handle_error("Возникла проблема с поиском вашей информации в нашей системе", "Ошибка обнаружения пользователя с id {$user_id}");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/phpMM.css">
</head>
<body>

    <div id="header"><h1>PHP & MySQL</h1></div>
    <div id="example">Профиль</div>
    <div id="content">
        <div class="user_profile">
            <h1><?php echo "{$first_name} {$last_name}"; ?></h1>
            <p>
                <img src="<?php echo $user_image;?>" class="user_pic">
                <?php echo $bio; ?>
            </p>
            <p class="contact_info">Поддерживайте связь с <?php echo "{$first_name} {$last_name}"; ?></p>
            <ul>
                <li><a href="mailto:<?php echo $mail; ?>">... по электронной почте</a></li>
                <li>... путем <a href="<?php echo $facebook_url;?>">посещение его страницы на facebook</a></li>
                <li>... путем <a href="<?php echo $twitter_url;?>">отслеживание его сообщений в twitter</a></li>
            </ul>
        </div>
    </div>

    <div class="footer"></div>

    
</body>
</html>