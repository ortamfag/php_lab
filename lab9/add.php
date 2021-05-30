<?php
// если были переданы данные для добавления в БД
if (isset($_POST['button']) && $_POST['button'] == 'Добавить запись') {
    $mysqli = mysqli_connect('std-mysql:3306', 'std_1578_lab9_php', '123238759', 'std_1578_lab9_php');

    if (mysqli_connect_errno()) // проверяем корректность подключения
        echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    // формируем и выполняем SQL-запрос для добавления записи
    $sql_res = mysqli_query($mysqli, 'INSERT INTO friends (family, name, lastname, gender, data, phone, location, email, comment) VALUES (
        "' . htmlspecialchars($_POST['family']) . '",
        "' . htmlspecialchars($_POST['name']) . '",
        "' . htmlspecialchars($_POST['lastname']) . '",
        "' . ($_POST['gender']) . '",
        "' . ($_POST['date']) . '",
        "' . htmlspecialchars($_POST['phone']) . '",
        "' . htmlspecialchars($_POST['location']) . '",
        "' . ($_POST['email']) . '",
        "' . htmlspecialchars($_POST['comment']) . '"
    )');
    // если при выполнении запроса произошла ошибка – выводим сообщение
    if (mysqli_errno($mysqli)) {
        print_r(mysqli_errno($mysqli));
        echo '<div class="error">Запись не добавлена</div>';
    } else // если все прошло нормально – выводим сообщение
        echo '<div class="ok">Запись добавлена с id '.mysqli_insert_id($mysqli).'</div>';
}
require 'add.html';
