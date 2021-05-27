<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Helvetica:wght@100;200;300;400&display=swap" rel="stylesheet">
    <title>Lab-6</title>
</head>
<body>
<header class="header">
    <div class="header-text">
      <h1>Лабораторная работа №6</h1>
        <h2>Ракитова Екатерина</h2>
        <h2>группа 201-322</h2>
    </div>
    <img src="mospoly.png" alt="">
</header>
<main>
    <div class="main">

        <?php
        if (!isset($_POST['A']))
            echo
                '<form action="" method="post" id="form">
                    <div class="inputs">
                        <div class="form-item">
                            <h3><label for="fio">Введите ФИО</label></h3>
                            <input type="text" id="fio" name="fio" required value="' . $_GET['FIO'] . '">
                        </div>
                        <div class="form-item">
                            <h3><label for="group">Номер группы</label></h3>
                            <input type="text" id="group" name="group_name" required value="' . $_GET['GROUP'] . '">
                        </div>
                        <textarea name="about" id="" cols="30" rows="10" placeholder="Немного о себе"></textarea>
                        <div class="form-item">
                            <h3><label for="a">A: </label></h3>
                            <input type="text" id="a" name="A" required value="' . mt_rand(0, 100) . '">
                        </div>
                        <div class="form-item">
                            <h3><label for="b">B: </label></h3>
                            <input type="text" id="b" name="B" required value="' . mt_rand(0, 100) . '">
                        </div>
                        <div class="form-item">
                            <h3><label for="c">C: </label></h3>
                            <input type="text" id="c" name="C" required value="' . mt_rand(0, 100) . '">
                        </div>
                        <select name="action" id="">
                            <option value="perimetr">Периметр треугольника</option>
                            <option value="square">Площадь треугольника</option>
                            <option value="volume">Объем параллелипипеда</option>
                            <option value="average">Среднее арифметическое</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <div class="form-item">
                            <h3><label for="answer">Ваш ответ</label></h3>
                            <input type="text" id="answer" name="answer" required>
                        </div>
                        <div class="form-item d-flex" id="email_block" style="display:none;">
                            <h3><label for="email">Ваш e-mail</label></h3>
                            <input type="email" id="email" name="e-mail">
                        </div>
                        <div class="form-item">
                            <h3><label for="email-check">Отправить результат теста по e-mail</label></h3>
                            <input type="checkbox" id="email-check">
                        </div>
                        <select name="version" id="">
                            <option value="browser">версия для просмотра в браузере</option>
                            <option value="print">версия для печати</option>
                        </select>
                    </div>
                    <button type="submit">Ввести</button>
                </form>';
        if (isset($_POST['A'])) {
            $a = $_POST['A'];
            $b = $_POST['B'];
            $c = $_POST['C'];
            switch ($_POST['action']) {
                case 'perimetr':
                    $pc_answer = $a + $b + $c;
                    break;
                case 'square':
                    $half_perimetr = ($a + $b + $c) / 2;
                    $pc_answer = round(sqrt($half_perimetr * ($half_perimetr - $a) * ($half_perimetr - $b) * ($half_perimetr - $c)), 3);
                    break;
                case 'volume':
                    $pc_answer = $a * $b * $c;
                    break;
                case 'average':
                    $pc_answer = round(($a + $b + $c) / 3, 3);
                    break;
            }
        }
        if (isset($pc_answer)) {
            $out_text = 'ФИО: ' . $_POST['fio'] . '<br>' . 'Группа: ' . $_POST['group_name'] . '<br>';
            if ($_POST['about']) $out_text .= $_POST['about'] . '<br>';
            $out_text .= 'Решаемая задача: ';
            switch ($_POST['action']) {
                case 'perimetr':
                    $out_text .= 'Периметр треугольника';
                    break;
                case 'square':
                    $out_text .= 'Площадь треугольника';
                    break;
                case 'volume':
                    $out_text .= 'Объем параллелипипеда';
                    break;
                case 'average':
                    $out_text .= 'Среднее арифметическое';
                    break;
            }
            $out_text .= '<br><div class="d-flex"> <h4>Ваш ответ:' . $_POST['answer'] . '</h4><h4>Вычисленное значение: ' . $pc_answer . '</h4></div><br>';
            if ($_POST['answer'] == $pc_answer) $out_text .= '<h3>Тест пройден</h3>';
            else $out_text .= '<h3>Тест не пройден</h3>';
            echo $out_text;
            if (array_key_exists('e-mail', $_POST)) {
                mail($_POST['e-mail'], 'Результат тестирования',
                    str_replace('<br>', "\r\n", $out_text),
                    "From: auto@mami.ru\n" . "Content-Type: text/plain; charset=utf-8\n");
                echo 'Результаты теста были автоматически отправлены на e-mail <b>' . $_POST['e-mail'] . '</b>';
            }
            echo '<a href="?FIO=' . $_POST['fio'] . '&GROUP=' . $_POST['group_name'] .
                '" id="back_button">Повторить тест</a>';
        }

        ?>
    </div>
</main>
<footer>
</footer>
<script>
    let checkbox = document.getElementById('email-check')
    checkbox.addEventListener('change', () => {
        let obj = document.getElementById('email_block');
        if (checkbox.checked)
            obj.style.display = 'flex';
        else
            obj.style.display = 'none';
    })


</script>
</body>
</html>
