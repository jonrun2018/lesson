<?php

require "database.php";

$header = trim($_REQUEST["header"]);
$price = trim($_REQUEST["price"]);
$tell = trim($_REQUEST["tell"]);
$text_contant = trim($_REQUEST["text_contant"]);

$result = true;

// if (!$header && !$tell) {
//     $result = false;
// };

if($result) {
    $insert_sql = "INSERT INTO users (header, price, tell, text_contant) ".
    "VALUE ('{$header}', '{$price}', '{$tell}', '{$text_contant}')";
} else {
    echo "ошибка";
}
    mysqli_query($link, $insert_sql) //запрос в базу данных
    or die("Ошибка: ".mysqli_error($link));

    // header("Location: show_user.php?users_id=". mysqli_insert_id($link));
    // exit();
}


?>