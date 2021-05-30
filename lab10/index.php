<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Сортировка массивов</title>
</head>
<header class="header">
		<img class="header__logo-img" src="images/logo.png" alt="Mospolytech">
		<a href="/" class="header__logo">№10 | Жидов Артем Валерьевич | 201-322</a>
	</header>

<body>
    <main>
        <?php
        session_start();
        if (!isset($_SESSION['history'])) {
            $_SESSION['history'] = array();
            $_SESSION['iteration'] = 0;
        } else $_SESSION['iteration'] += 1;

        require 'form.html';

        if (isset($_POST['val'])) {
            $res = calculateSq($_POST['val']); // вычисляем результат выражения
            if (isnum($res)) // если полученный результат является числом
                echo '<div class="success">Значение выражения: ' . $_POST['val'] . ' = ' . $res . '</div>'; // вывод значения
            else // если результат не число – значит ошибка!
                echo '<div class="success">Ошибка вычисления выражения: ' . $_POST['val'] . '  ' . $res . '</div>'; // вывод ошибки
        }

        function is_calculate($x)
        {
            if (preg_match("/(\d+\.\d+|\d+)[+*\/\-:]/", $x)) return true;
            else return false;
        }

        function isnum($x)
        {
            if (@$x[0] == '.') return false;
            for ($i = 0, $point_count = false; $i < strlen($x); $i++) {
                if (@$x[$i] == '.') { // если в строке встретилась точка
                    if ($point_count) return false; // если точка уже встречалась то это не число
                    else $point_count = true; // если это первая точка в строке запоминаем это
                }
                if (preg_match("/[a-zA-Z_]/", $x))
                    return false;
                else return true;
            }
        }

        function SqValidator($v)
        {
            $open = 0; // создаем счетчик открывающихся скобок
            for ($i = 0; $i < strlen($v); $i++) // перебираем все символы строки
            {
                if ($v[$i] == '(') // если встретилась «(»
                    $open++; // увеличиваем счетчик
                else
            if ($v[$i] == ')') // если встретилась «)»
                {
                    $open--; // уменьшаем счетчик
                    if ($open < 0) // если найдена «)» без соответствующей «(»
                        return false; // возвращаем ошибку
                }
            }
            // если количество открывающихся и закрывающихся скобок разное
            if ($open !== 0) return false; // возвращаем ошибку
            if ($open === 0) return true; // количество скобок совпадает – все ОК
        }

        function calculateSq($val)
        {
            if (!SqValidator($val)) echo 'Скобки нормально расставь, чорт';
            $start = strpos($val, '(');
            if ($start === false) return calculate($val);
            for ($end = $start + 1; $end < strlen($val); $end++) {
                if ($val[$end] == '(') $start = $end;
                if ($val[$end] == ')') break;
            }
            $new_val = substr($val, 0, $start);
            $new_val .= substr($val, ($start + 1), $end - $start - 1);
            $new_val .= substr($val, $end + 1);
            return calculateSq($new_val);
        }

        function calculate($val)
        {
            if (!$val) return 'Выражение не задано!';
            if (!is_calculate($val)) return $val;
            //сумма
            $args = explode('+', $val);
            if (count($args) > 1) {
                $sum = 0;
                for ($i = 0; $i < count($args); $i++) {
                    if (is_calculate($args[$i])) $sum += calculate($args[$i]);
                    elseif (isnum($args[$i])) {
                        $sum += $args[$i];
                    } else "Операнд не числовой";
                }
                return $sum;
            }
            //разность
            $args = explode('-', $val);
            if (count($args) > 1) {
                if (is_calculate($args[0])) $sub = calculate($args[0]);
                elseif (isnum($args[0])) $sub = $args[0];
                else "Операнд не числовой";
                for ($i = 1; $i < count($args); $i++) {
                    if (is_calculate($args[$i])) {
                        $args[$i] = calculate($args[$i]);
                        $sub = $sub - $args[$i];
                    } elseif (isnum($args[$i])) $sub = $sub - $args[$i];
                    else "Операнд не числовой";
                }
                return $sub;
            }
            //произведение
            $args = explode('*', $val);
            if (count($args) > 1) {
                $comp = 1;
                for ($i = 0; $i < count($args); $i++) {
                    if (is_calculate($args[$i])) $comp *= calculate($args[$i]);
                    elseif (isnum($args[$i])) $comp *= $args[$i];
                    else "Операнд не числовой";
                }
                return $comp;
            }
            //деление
            $args = explode(':', $val);
            if (count($args) > 1) return div($args);
            $args = explode('/', $val);
            if (count($args) > 1) return div($args);
        }

        function div($args)
        {
            if (is_calculate($args[0])) $div = calculate($args[0]);
            elseif (isnum($args[0])) $div = $args[0];
            else 'Операнд не числовой';
            for ($i = 1; $i < count($args); $i++) {
                if (is_calculate($args[$i])) {
                    $args[$i] = calculate($args[$i]);
                    $sub = $div - $args[$i];
                } elseif (isnum($args[$i])) $div = $div / $args[$i];
                else "Операнд не числовой";
            }
            return $div;
        }
        for ($i = 0; $i < count($_SESSION['history']); $i++) {
            echo $_SESSION['history'][$i] . '<br>';
        }

        if (isset($_POST['val']) && $_POST['iteration'] + 1 == $_SESSION['iteration'])
            $_SESSION['history'][] = $_POST['val'] . ' = ' . $res;

        echo '</div>';
        ?>
    </main>
</body>

</html>