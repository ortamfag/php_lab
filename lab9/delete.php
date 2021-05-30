<?php
$mysqli = mysqli_connect('std-mysql:3306', 'std_1578_lab9_php', '123238759', 'std_1578_lab9_php');
if (mysqli_connect_errno()) { // проверяем корректность подключения
    echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    exit();
}

if (isset($_POST['button']) && $_POST['button'] == 'Удалить запись') {
    $sql_res = mysqli_query(
        $mysqli,
        'DELETE FROM friends WHERE id=' . $_GET['id'] . ''
    );
    if (mysqli_errno($mysqli)) {
        print_r(mysqli_errno($mysqli));
        echo '<div class="error">Запись не удалена</div>';
    } else // если все прошло нормально – выводим сообщение
        echo '<div class="ok">Запись удалена</div>';
}

$currentRow = array();
if (isset($_GET['id'])) {
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM `friends` WHERE id=' . $_GET['id'] . ' ORDER BY family LIMIT 0,1');
    $currentRow = mysqli_fetch_assoc($sql_res);
}
if (!$currentRow) {
    $sql_res = mysqli_query($mysqli, 'SELECT * FROM `friends` ORDER BY family LIMIT 0,1');
    $currentRow = mysqli_fetch_assoc($sql_res);
}

$sql_res = mysqli_query($mysqli, 'SELECT * FROM friends ORDER BY family');
if (!mysqli_errno($mysqli)) {
    echo '<div class="div-edit">';
    while ($row = mysqli_fetch_assoc($sql_res)) {
        if ($currentRow['id'] == $row['id'])
            echo '<div class="currentRow">' . $row['family'] . ' ' . $row['name'] . '</div>';
        else echo '<a href="?p=delete&id=' . $row['id'] . '">' . $row['family'] . ' ' . $row['name'] . '</a><br/>';
    }
    echo '</div>';
}

if ($currentRow) {
    echo '<aside><form name="form_edit" method="post" action="?p=delete&id=' . $currentRow['id'] . '">';
    echo '<div class="column">
                <button
            type="submit"
            value="Удалить запись"
            name="button"
            class="form-btn"
        >
            Удалить запись
        </button>
    </div>
</form>
</aside>
';
}
