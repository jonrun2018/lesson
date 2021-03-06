<?php

require_once "database_connection.php";


$upload_dir = HOST_WWW_ROOT."/uploads/profile_pics/";
$image_fieldname = "user_pic";

//потонцеальные php ошибки отправки файлов
$php_errors = array(
    1 => 'Привышен максимальный размер файла, указанный в настройках хостинга',
    2 => 'Превышен макс. размер файла, в поле html',
    3 => 'Была отправленна только часть файла',
    4 => 'Файл для отправки не был выбран'
);

$first_name = trim($_REQUEST["first_name"]); // rtrim - убирает пробелы с права, ltrim - убирает пробелы с лева
$last_name = trim($_REQUEST["last_name"]);
$email = trim($_REQUEST["email"]);
$bio = trim($_REQUEST["bio"]);
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

//проверка отсудствия ошибки при отправки изображения
($_FILES[$image_fieldname]['error'] == 0)
    or handle_error("Сервер не может получить выбранное вами изображение.", $php_errors[$_FILES[$image_fieldname]['error']]);

// Являиться ли этот файл результатом нормальной отправки
@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
    or handle_error("Вы попытались загрузить некорректное изображение", "Запрос на отправку: фаил назывался'{$_FILES[$image_fieldname]['tmp_name']}'");

// Действительно ли это изображение
@getimagesize($_FILES[$image_fieldname]['tmp_name'])
    or handle_error("Вы выбрали файл для своего фото, который не являеться изображением", "{$_FILES[$image_fieldname]['tmp_name']} не являеться файлом изображения");

// Присваивание файлу уникального имени
$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fieldname]['name'])){
    $now++;
}

$insert_sql = "INSERT INTO users (first_name, last_name, email, facebook_url, twitter_handle,bio) ".
"VALUE ('{$first_name}', '{$last_name}', '{$email}', '{$facebook_url}', '{$twitter_handle}', '{$bio}')";

mysqli_query($link, $insert_sql) //запрос в базу данных
or die("Ошибка: ".mysqli_error($link));

$image = $_FILES[$image_fieldname];
$image_filename = $image['name'];
$image_info = getimagesize($image['tmp_name']);
$image_mime_type = $image_info['mime'];
$image_size = $image['size'];
$image_data = file_get_contents($image['tmp_name']);


$insert_image_sql= sprintf("INSERT INTO images (file_name, mime_type, file_size, image_data) ".
    "VALUES ('%s','%s', '%d', '%s');", 
    mysqli_real_escape_string($link, $image_filename),
    mysqli_real_escape_string($link, $image_mime_type),
    mysqli_real_escape_string($link, $image_size),
    mysqli_real_escape_string($link, $image_data)
);

mysqli_query($link, $insert_image_sql);

header("Location: show_user.php?users_id=". mysqli_insert_id($link));
exit();
?>