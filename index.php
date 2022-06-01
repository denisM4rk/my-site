<?php
$link = mysqli_connect("localhost", "root", "root");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    $sql = 'INSERT INTO cities SET name = "Санкт-Петербург"';
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }
    else {
        $city_id = mysqli_insert_id($link);

        $sql = 'INSERT INTO weather_log SET city_id = ' . $city_id . ', day = "2017-09-03", temperature = 10, cloud = 1';

        $result = mysqli_query($link, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }
    }
}

$sql1 = 'SELECT id, name FROM cities';

$result1 = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {
    print("Город: " . $row['name'] . "; Идентификатор: . " . $row['id'] . "<br>");
}

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC)

foreach ($rows as $row) {
    print("Город: " . $row['name'] . "; Идентификатор: . " . $row['id'] . "<br>");