<meta charset="UTF-8">
<?php

$string_to_search = "Mr.Martin OMC-28LJ";
$regex = "/(Mr|Dr)/"; // регулярное выражение для поиск, | - здесь означает или

$num_matches = preg_match($regex, $string_to_search);

if ($num_matches > 0) {
    echo "<h1>Соответсвие найдено</h1>";
}else {
    echo "<h1>Соответствие НЕ найдино</h1>";
}

?>