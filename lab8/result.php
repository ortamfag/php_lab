<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

			<div class="header__info">Кириллов Д.П. | 201-322 | №8</div>
		</div>
	</header>

	<main class="main container">

		<h3>Исходный текст</h3>
		<?php 
			if( isset($_POST['data']) && $_POST['data']) {
				echo '<p>' . $_POST['data'] . '</p>';
				echo '<hr>';
				echo '<h3>Информация о тексте</h3>';
				test_it(iconv("utf-8", "cp1251", $_POST['data'])); 
			} else
				echo '<p>Нет текста для анализа</p>';

			function test_it($text) {
				echo 'Количество символов: ' . strlen($text).'<br>';
				
				$cifra = array( '0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true,
								'5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true);

				$Punctuation = array( '`'=>true, '~'=>true, '!'=>true, '@'=>true, '"'=>true,
									'№'=>true, '#'=>true, '$'=>true, ';'=>true, '%'=>true, 
									'^'=>true, ':'=>true, '?'=>true, '&'=>true, '*'=>true, 
									'('=>true, ')'=>true, '-'=>true, '_'=>true, '+'=>true,
									'='=>true, "'"=>true, '}'=>true, '{'=>true, '['=>true,
									']'=>true, '/'=>true, '"\"'=>true, '|'=>true ); 

				$cifra_amount = 0;
				$word = '';
				$countPunctuation = 0;
				$words = array();

				for ($i = 0; $i < strlen($text); $i++) {
					if (array_key_exists($text[$i], $cifra))
						$cifra_amount++;

					if (array_key_exists($text[$i], $Punctuation))
						$countPunctuation++;

					if ($text[$i] == ' ' || $i == strlen($text) - 1) {
						if($i == strlen($text)-1){
							$word.=$text[$i];
						}

						if ($word) {
							if (isset($words[$word])) {
								$words[$word]++;	
							} else
								$words[$word] = 1;
						}

						$word = '';
					} else
						$word .= $text[$i];
				}

				$redi = asArrayLeters($text, $cifra, $Punctuation);
				echo 'Количество цифр: ' . $cifra_amount . '<br>';

				$coutwords = 0;
				foreach ($words as $item => $item_count)
					$coutwords += 1 * $item_count;

				echo 'Количество слов: ' . $coutwords.'<br>';

				$countSpace = $coutwords - 1;
				echo 'Количество пробелов: ' . $countSpace . '<br>';

				echo 'Количество знаков препинания: ' . $countPunctuation . '<br>';

				echo 'Количество знаков верхнего регистра: ' . $redi[0] . '<br>';

				echo 'Количество знаков нижнего регистра: ' . $redi[1] . '<br>';


				ksort($words);
				foreach($words as $item => $item_count)
					echo iconv("cp1251", "utf-8", $item) . "=" . $item_count.'<br>';
			}

			function asArrayLeters($text, $cifra, $Punctuation){
				$asArray = array();
				$up = 0;
				$low = 0;
				for ($i = 0; $i < strlen($text); $i++){
					if (!(array_key_exists($text[$i], $cifra) || array_key_exists($text[$i], $Punctuation) || $text[$i] == ' ')) {
						if(ctype_upper($text[$i]))
							$up++;
						else 
							$low++;
					}

					$text[$i] = strtolower($text[$i]);

					if (!(array_key_exists($text[$i], $cifra) || array_key_exists($text[$i], $Punctuation) || $text[$i] == ' ')) {
						if(!isset($asArray[$text[$i]]))
							$asArray[$text[$i]] = 1;
						else 
							$asArray[$text[$i]] +=1 ;
					}
				}

				ksort($asArray);
				foreach($asArray as $item => $item_count) {
					echo iconv("cp1251", "utf-8", $item) . "=" . $item_count.'<br>';
				}

				return [$up, $low];
			} 
		?>
	</main>

	<footer class="footer">
		<div class="footer__info">нарды</div>
	</footer>
</body>
</html>