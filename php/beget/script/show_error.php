<?php

    require "app_config.php";

    if(isset($_REQUEST['error_message'])) { //проверяет фаил на существование    
        $error_message = preg_replace("/\\\\/", "", $_REQUEST['error_message']);
    } else {
        $error_message = "Шо то там сбой какой-то, походу";
    }
    
    if(isset($_REQUEST['system_error_message'])) {
        $system_error_message = preg_replace("/\\\\/", "", $_REQUEST['system_error_message']);
    } else {
        $system_error_message = "Раслабься, сообщения отсудствуют";
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
    
    <div id="header">
        <h1>PHP & MySQL</h1>
    </div>

    <div id="example">Ты сломал сайт!!!</div>

    <div id="content">
        <h1>Рукожоп</h1>
        <p>
            <img src="../images/error.jpg" alt="" class="error">
            <?php echo $error_message; ?>
        </p>
        <p>Не вздумай писать мне <a href="mailto:info@mail.ru">на почту</a></p>
        <p>Вали обратно, на предедущую страницу может исправишь, <a href="javascript:history.go(-1);">щелкни здесь</a>,  придурок!</p>   
        <?php
            debug_print("<hr>");
            debug_print("<p>Было получино сообщение об ошибке системного уровня: <b>{$system_error_message}</b></p>")
        ?>
    </div>

    <div id="footer"></div>

</body>
</html>