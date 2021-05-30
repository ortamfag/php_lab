<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="style.css">
</head>
<body>
	<main>
		<?php 
			include 'sortFunctions.php';

			$arrNumbers = [];
			$isNumberArr = true;

			for ($i = 0; $i < $_POST['arrLength']; $i++) {

				if (!is_numeric($_POST['element' . $i]))
					$isNumberArr = false;

				$arrNumbers[] = $_POST['element' . $i];
			}

			echo '<h2>Исходный массив</h2>';
			foreach ($arrNumbers as $key => $item)
				echo '<div>#'. $key . ' ' . $item .'</div>';
			echo '<hr>';
			echo $isNumberArr ? 'Сортировка возможна' : 'Сортировка невозможна';

			echo '<h2>' . $_POST['opt'] . '</h2>';

			$time = microtime(true);

			
			if ($isNumberArr) {
				switch ($_POST['opt']) {
					case 'Сортировка выбором':
						selectSort($arrNumbers);
						break;
					
					case 'Пузырьковый алгоритм':
						bubbleSort($arrNumbers);
						break;

					case 'Алгоритм Шелла':
						shellSort($arrNumbers, 1);
						break;

					case 'Алгоритм садового гнома':
						gnomeSort($arrNumbers);
						break;

					case 'Быстрая сортировка':
						quickSort($arrNumbers, 0, count($arrNumbers));
						echo '<hr>';
						echo 'Количество итераций: ' . $n;
						break;

					case 'Встроенная функция PHP для сортировки списков по значению':
						inPhpSort($arrNumbers);
						break;
				}
				echo '<hr>';
				echo 'Затрачено ' . ($time - microtime(true)) . ' микросекунд!'; 
			}
		?>
	</main>

	<footer><?php echo "<p> &nbsp; Сформировано:" . date("d.m.Y в H-i.s") . "</p>"; ?></footer>
</body>
</html>
