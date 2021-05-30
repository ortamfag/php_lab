<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Использование форм. Тест математических знаний</title>
</head>
<body>
	<header class="header">
		<img class="header__logo-img" src="images/logo.png" alt="Mospolytech">
		<a href="/" class="header__logo">№6 | Жидов Артем Валерьевич | 201-322</a>
	</header>

	<main>
    <?php
		if (isset($_POST['A']) && isset($_POST['B']) && isset($_POST['C'])) {
			switch($_POST['method']){
				case 'Найти минимум':
					$result = min($_POST['A'], $_POST['B'], $_POST['C']);

					break;
				case 'Площадь треугольника':
					$result = ($_POST['A'] + $_POST['B'] + $_POST['C']) / 2;
					$result = sqrt($result * ($result - $_POST['A']) * ($result - $_POST['B']) * ($result - $_POST['C']));

					break;
				case 'Периметр треугольника':
					$result = $_POST['A'] + $_POST['B'] + $_POST['C'];

					break;
				case 'Среднее арифметическое':
					$result = $_POST['A'] + $_POST['B'] + $_POST['C'];
					$result = $result / 3;

					break;
				case 'Найти максимум':
					$result = max($_POST['A'], $_POST['B'], $_POST['C']);

					break;
				case 'Произведение чисел':
					$result = $_POST['A'] * $_POST['B'] * $_POST['C'];

					break;
			}

			$result = round($result, 2);
		}


		if (isset($result)) {
			$outText = '';

			$outText.='ФИО: '.$_POST['fullname'].'<br>';
			$outText.='Группа: '.$_POST['number'].'<br>';
			$outText.='О себе: '.$_POST['about'].'<br>';
			$outText.='Решаемая задача: ';

			switch ($_POST['method']){
				case 'Найти минимум':
					$outText.='Найти минимум';
					break;
				case 'Площадь треугольника':
					$outText.='Площадь треугольника';
					break;
				case 'Периметр треугольника':
					$outText.='Периметр треугольника';
					break;
				case 'Среднее арифметическое':
					$outText.='Среднее арифметическое';
					break;
				case 'Найти максимум':
					$outText.='Найти максимум';
					break;
				case 'Произведение чисел':
					$outText.='Произведение чисел';
					break;
			}

			$outText.='<br>Входные числа: '.$_POST['A'].', '.$_POST['B'].', '.$_POST['C'].'<br>';
			$outText.='Ваш ответ: '.$_POST['answer'].'<br>';
			$outText.='Правильный ответ: '.$result.'';

			if ($result == $_POST['answer']) {
				$outText.='<br><b>Тест пройден!</b><br>';
			} else {
				if(!empty($_POST['answer']))
					$outText.='<br><b>Тест не пройден!</b><br>';
				else
					$outText.='<br><b>Задача самостоятельно решена не была</b><br>';
			}
			
			echo '<a class="try" href="?fullname='.$_POST['fullname'].'&number='.$_POST['number'].'"id="button">Повторить тест</a><br>';
			
			if ($_POST['view']=='print' && isset($_POST['view'])) {
				echo '<link rel="stylesheet" type="text/css" href="print.css">';
				// echo '<script>window.print()</script>';
			}
				
			echo '<div class="result">'.$outText.'</div>';
				
			if (!empty($_POST['email'])) {
				mail($_POST['email'], 'Результат тестирования', str_replace('<br>', "\r\n", $outText), 
				'From: auto228@gmail.com\n'.'Content-Type: text/plain; charset=utf-8\n');
				echo 'Результат успешно отправлен!';
			}
		} else {
			include ('form.html');
		}

    ?>
	</main>

	<footer><?php echo "<p> &nbsp; Сформировано:" . date("d.m.Y в H-i.s") . "</p>"; ?></footer>
</body>