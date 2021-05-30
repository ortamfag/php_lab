<?php
$mysqli = mysqli_connect('std-mysql:3306', 'std_1578_lab9_php', '123238759', 'std_1578_lab9_php');
if (mysqli_connect_errno()) { // проверяем корректность подключения
    echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    exit();
}

if (isset($_POST['button']) && $_POST['button'] == 'Изменить запись') {
    $sql_res = mysqli_query(
        $mysqli,
        'UPDATE friends SET
    family="' . htmlspecialchars($_POST['family']) . '",
    name="' . htmlspecialchars($_POST['name']) . '",
    lastname="' . htmlspecialchars($_POST['lastname']) . '",
    gender="' . $_POST['gender'] . '",
    phone="' . htmlspecialchars($_POST['phone']) . '",
    location="' . htmlspecialchars($_POST['location']) . '",
    email="' . $_POST['email'] . '",
    comment="' . htmlspecialchars($_POST['comment']) . '" WHERE id=' . $_GET['id'] . ''
    );
    if (mysqli_errno($mysqli)) {
        print_r(mysqli_errno($mysqli));
        echo '<div class="error">Запись не изменена</div>';
    } else // если все прошло нормально – выводим сообщение
        echo '<div class="ok">Запись изменена</div>';
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
        else echo '<a href="?p=edit&id=' . $row['id'] . '">' . $row['family'] . ' ' . $row['name'] . '</a><br/>';
    }
    echo '</div>';
}

if ($currentRow) {
    echo '<aside><form name="form_edit" method="post" action="?p=edit&id=' . $currentRow['id'] . '">';
    echo '<div class="column">
        <div class="add">
            <label>Фамилия</label>
            <input type="text" name="family" placeholder="Фамилия" value="' . $currentRow['family'] . '" />
        </div>
        <div class="add">
            <label>Имя</label>
            <input type="text" name="name" placeholder="Имя" value="' . $currentRow['name'] . '" />
        </div>
        <div class="add">
        <label>Отчество</label>
        <input type="text" name="lastname" placeholder="Отчество" value="' . $currentRow['lastname'] . '" />
    </div>
        <div class="add">
            <label>Пол</label>
            <select name="gender" required>
                <option  value="' . $currentRow['gender'] . '">' . $currentRow['gender'] . '</option>
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="add">
            <label>Телефон</label>
            <input type="text" name="phone" placeholder="Телефон" value="' . $currentRow['phone'] . '" />
        </div>
        <div class="add">
            <label>Адрес</label>
            <input type="text" name="location" placeholder="Адрес" value="' . $currentRow['location'] . '" />
        </div>
        <div class="add">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" value="' . $currentRow['email'] . '" />
        </div>
        <div class="add">
            <label>Комментарий</label>
            <textarea
                name="comment"
                placeholder="Краткий комментарий"
            ></textarea>
        </div>

        <button
            type="submit"
            value="Изменить запись"
            name="button"
            class="form-btn"
        >
            Изменить запись
        </button>
    </div>
</form>
</aside>';
}
