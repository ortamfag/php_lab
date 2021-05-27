<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Жидов А.В. | 201-322 | №4</title>

	<link rel="stylesheet" href="styles.css">
</head>
<body class="body">
	<header class="header">
		<div class="container header__inner">
			<img 
				src="images/logo.png"
				alt="Polytech"
				class="header__logo"
			>

			<div class="header__info">Жидов А.В. | 201-322 | №4</div>
		</div>
	</header>

	<main class="main container">
		<?php
			function getTR($data, $rt) {
				$arr = explode('*', $data);
				$ret = '<tr>';

				for ($i = 0; $i < $rt; $i++)
					$ret .= '<td>' . $arr[$i] . '</td>';

				return $ret . '</tr>';
			}

			function outTable($structure, $rt) {
				$strings = explode('#', $structure);
				$countNun = 0;

				for ($i = 0; $i < count($strings); $i++) {
					if ($strings[$i] == '') $countNun++;
				}

				if ($countNun != count($strings)) {
					$datas = '';
					for ($i = 0; $i < count($strings); $i++)
						$datas .= getTR($strings[$i], $rt);
					if ($datas)
						echo '<table>' . $datas . '</table>';
				} else echo 'В таблице нет строк с ячейками';
			}

			$countRT = 10;

			$structure = array(
				'C1*C2*C3#C4*C5*C6', 
				'C7*C8*C9#*c1*#C10*C11*C12',
				'#', 
				'',
				'C13*C14*C15#C16*C17*C18#'
			);

			if ($countRT != 0)
				for ($i = 0; $i < count($structure); $i++) {
					echo '<h2 class="title">Таблица№' . ++$i . '</h2>';
					$i--;
					if ($structure[$i] != '')
						outTable($structure[$i], $countRT);
					else
						echo 'В таблице нет строк';
				}
			else
				echo 'Неправильное число колонок';
		?>
	</main>

	<footer class="footer">
		<div class="footer__info">а у вас в подвале армяне в нарды играют</div>
	</footer>
</body>
</html>