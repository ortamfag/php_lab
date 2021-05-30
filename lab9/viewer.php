<?php

function getFriendsList($type, $page)
{
    $mysqli = mysqli_connect('std-mysql:3306', 'std_1578_lab9_php', '123238759', 'std_1578_lab9_php');


    if (mysqli_connect_errno()) // проверяем корректность подключения
        return 'Ошибка подключения к БД: ' . mysqli_connect_error();
    // формируем и выполняем SQL-запрос для определения числа записей
    $sql_res = mysqli_query($mysqli, 'SELECT COUNT(*) FROM friends');
    // проверяем корректность выполнения запроса и определяем его результат
    if (!mysqli_errno($mysqli) && $row = mysqli_fetch_row($sql_res)) {
        if (!$TOTAL = $row[0]) // если в таблице нет записей
            return 'В таблице нет данных'; // возвращаем сообщение
        $PAGES = ceil($TOTAL / 10); // вычисляем общее количество страниц
        if ($page >= $TOTAL) // если указана страница больше максимальной
            $page = $TOTAL - 1; // будем выводить последнюю страницу
        // формируем и выполняем SQL-запрос для выборки записей из БД
        if ($_GET['sort'] == 'byid') $sql = 'SELECT * FROM friends ORDER BY id LIMIT  ' . ($page * 10) . ', 10';
        if ($_GET['sort'] == 'fam') $sql = 'SELECT * FROM friends ORDER BY family LIMIT  ' . ($page * 10) . ', 10';
        if ($_GET['sort'] == 'born') $sql = 'SELECT * FROM friends ORDER BY data LIMIT ' . ($page * 10) . ', 10';
        $sql_res = mysqli_query($mysqli, $sql);
        $ret = '<table>'; // строка с будущим контентом страницы
        $ret .= '<tr><td>ID</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Пол</td><td>Дата рождения</td>
        <td>Телефон</td><td>Адрес</td><td>Email</td><td>Коммент</td></tr>';
        while ($row = mysqli_fetch_assoc($sql_res)) // пока есть записи
        {
            // выводим каждую запись как строку таблицы
            $ret .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['family'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['lastname'] . '</td>
                <td>' . $row['gender'] . '</td>
                <td>' . $row['data'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['location'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['comment'] . '</td>
            </tr>';
        }
        $ret .= '</table>'; // заканчиваем формирование таблицы с контентом
        if ($PAGES > 1) // если страниц больше одной – добавляем пагинацию
        {
            $ret .= '<div id="pages">'; // блок пагинации
            for ($i = 0; $i < $PAGES; $i++) // цикл для всех страниц пагинации
                if ($i != $page) // если не текущая страница
                    $ret .= '<a href="?p=viewer&pg=' . $i . '">' . ($i + 1) . '</a>';
                else // если текущая страница
                    $ret .= '<span>' . ($i + 1) . '</span>';
            $ret .= '</div>';
        }
        return $ret; // возвращаем сформированный контент
    }
    // если запрос выполнен некорректно
    else return 'Неизвестная ошибка'; // возвращаем сообщение
}
